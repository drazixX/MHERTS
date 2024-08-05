<?php
session_start();
include_once '../connection/conn.php';

if(isset($_POST['restore_id'])) {
    $file_id = mysqli_real_escape_string($conn, $_POST['restore_id']);

    // Start transaction for atomicity
    mysqli_autocommit($conn, false);

    // Retrieve archived file data
    $select_query = "SELECT * FROM archive_pfiles WHERE file_id = '$file_id'";
    $result = mysqli_query($conn, $select_query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Insert data back into preg_files table
        $insert_query = "INSERT INTO preg_files (file_id, file_name, file_type, file_size, date_of_insertion, save_path, FamilyRec_Id, history_id)
                         VALUES ('$file_id', '{$row['file_name']}', '{$row['file_type']}', '{$row['file_size']}', '{$row['date_of_insertion']}', '{$row['save_path']}', '{$row['FamilyRec_Id']}', '{$row['history_id']}')";

        if(mysqli_query($conn, $insert_query)) {
            // Delete from archive_pfiles table
            $delete_query = "DELETE FROM archive_pfiles WHERE file_id = '$file_id'";
            if(mysqli_query($conn, $delete_query)) {
                // Commit transaction
                mysqli_commit($conn);

                $_SESSION['message'] = 'File has been restored successfully!';
                $_SESSION['success'] = 'success';
            } else {
                // Rollback transaction on delete error
                mysqli_rollback($conn);

                $_SESSION['message'] = 'Error restoring file: ' . mysqli_error($conn);
                $_SESSION['success'] = 'danger';
            }
        } else {
            // Rollback transaction on insert error
            mysqli_rollback($conn);

            $_SESSION['message'] = 'Error restoring file: ' . mysqli_error($conn);
            $_SESSION['success'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'File not found in archive.';
        $_SESSION['success'] = 'danger';
    }

    // Redirect back to the previous page or handle error scenario
    header("Location: ../archive_file.php");
    exit;
} else {
    $_SESSION['message'] = 'File ID not provided.';
    $_SESSION['success'] = 'danger';

    // Redirect back to the previous page or handle error scenario
    header("Location: ../archive_file.php");
    exit;
}

mysqli_close($conn);
?>
