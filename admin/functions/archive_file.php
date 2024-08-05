<?php
session_start();
include_once '../connection/conn.php';

// Check if all necessary parameters are provided via GET
if(isset($_GET['file_id'], $_GET['history_id'], $_GET['FamilyRec_Id'], $_GET['folder_name'])) {
    // Sanitize input to prevent SQL injection
    $file_id = mysqli_real_escape_string($conn, $_GET['file_id']);
    $history_id = mysqli_real_escape_string($conn, $_GET['history_id']);
    $FamilyRec_Id = mysqli_real_escape_string($conn, $_GET['FamilyRec_Id']);
    $folder_name = mysqli_real_escape_string($conn, $_GET['folder_name']);

    // Check if file_id, history_id, FamilyRec_Id, and folder_name are not empty
    if(!empty($file_id) && !empty($history_id) && !empty($FamilyRec_Id) && !empty($folder_name)) {
        // Start transaction for atomicity
        mysqli_autocommit($conn, false);

        // Disable foreign key checks
        mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS = 0');

        // Query to insert file data into archive_pfiles table
        $insert_query = "INSERT INTO archive_pfiles (file_id, file_name, file_type, file_size, date_of_insertion, save_path, FamilyRec_Id, history_id)
                         SELECT file_id, file_name, file_type, file_size, NOW(), save_path, '$FamilyRec_Id', '$history_id'
                         FROM preg_files
                         WHERE file_id = '$file_id' AND history_id = '$history_id' AND FamilyRec_Id = '$FamilyRec_Id'";

        if(mysqli_query($conn, $insert_query)) {
            // Query to delete file from preg_files table
            $delete_query = "DELETE FROM preg_files WHERE file_id = '$file_id' AND history_id = '$history_id' AND FamilyRec_Id = '$FamilyRec_Id'";

            if(mysqli_query($conn, $delete_query)) {
                // Commit transaction
                mysqli_commit($conn);

                // Re-enable foreign key checks
                mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS = 1');

                $_SESSION['message'] = 'File has been archived and removed!';
                $_SESSION['success'] = 'success';
            } else {
                // Rollback transaction on delete error
                mysqli_rollback($conn);

                // Re-enable foreign key checks before rolling back
                mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS = 1');

                $_SESSION['message'] = 'Error deleting file: ' . mysqli_error($conn);
                $_SESSION['success'] = 'danger';
            }
        } else {
            // Rollback transaction on insert error
            mysqli_rollback($conn);

            // Re-enable foreign key checks before rolling back
            mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS = 1');

            $_SESSION['message'] = 'Error archiving file: ' . mysqli_error($conn);
            $_SESSION['success'] = 'danger';
        }

        // Redirect back to the previous page with appropriate parameters
        header("Location: ../view_preg_history.php?FamilyRec_Id=" . urlencode($FamilyRec_Id) . "&history_id=" . urlencode($history_id) . "&folder_name=" . urlencode($folder_name));
        exit;
    } else {
        $_SESSION['message'] = 'Required parameters not provided.';
        $_SESSION['success'] = 'danger';

        // Redirect back to the previous page or handle error scenario
        header("Location: ../appointment.php");
        exit;
    }
} else {
    $_SESSION['message'] = 'Required parameters not provided.';
    $_SESSION['success'] = 'danger';

    // Redirect back to the previous page or handle error scenario
    header("Location: ../patient_list.php");
    exit;
}

mysqli_close($conn);
?>
