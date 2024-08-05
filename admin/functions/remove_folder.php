<?php
include '../connection/conn.php';

// Check if history_id and FamilyRec_Id are set
if(isset($_GET['history_id']) && isset($_GET['FamilyRec_Id'])) {
    // Prepare the SQL statement to delete records from preg_files
    $query_files = "DELETE FROM preg_files WHERE history_id = ? AND familyrec_id = ?";
    $stmt_files = mysqli_prepare($conn, $query_files);
    mysqli_stmt_bind_param($stmt_files, "ii", $_GET['history_id'], $_GET['FamilyRec_Id']);
    mysqli_stmt_execute($stmt_files);

    // Check if deletion from preg_files was successful
    if (mysqli_stmt_affected_rows($stmt_files) > 0) {
        // Deletion from preg_files was successful
        echo "Records deleted from preg_files.";

        // Now, prepare the SQL statement to delete records from preg_history
        $query_history = "DELETE FROM preg_history WHERE history_id = ? AND FamilyRec_Id = ?";
        $stmt_history = mysqli_prepare($conn, $query_history);
        mysqli_stmt_bind_param($stmt_history, "ii", $_GET['history_id'], $_GET['FamilyRec_Id']);
        mysqli_stmt_execute($stmt_history);

        // Check if deletion from preg_history was successful
        if (mysqli_stmt_affected_rows($stmt_history) > 0) {
            // Deletion from preg_history was successful
            echo "Records deleted from preg_history.";
            header("Location: ../patient_details.php?FamilyRec_Id=".$_GET['FamilyRec_Id']);
            exit();
        } else {
            // Deletion from preg_history failed
            echo "Error deleting records from preg_history: " . mysqli_error($conn);
        }
    } else {
        // No records found in preg_files, proceed with deletion from preg_history directly
        $query_history = "DELETE FROM preg_history WHERE history_id = ? AND FamilyRec_Id = ?";
        $stmt_history = mysqli_prepare($conn, $query_history);
        mysqli_stmt_bind_param($stmt_history, "ii", $_GET['history_id'], $_GET['FamilyRec_Id']);
        mysqli_stmt_execute($stmt_history);

        // Check if deletion from preg_history was successful
        if (mysqli_stmt_affected_rows($stmt_history) > 0) {
            // Deletion from preg_history was successful
            echo "Records deleted from preg_history.";
            header("Location: ../patient_details.php?FamilyRec_Id=".$_GET['FamilyRec_Id']);
            exit();
        } else {
            // Deletion from preg_history failed
            echo "Error deleting records from preg_history: " . mysqli_error($conn);
        }
    }
} else {
    // Invalid parameters
    echo "Invalid parameters.";
}
?>
