<?php
include('./connection/conn.php');

// Get the doctor ID from the request
$doctorId = $_POST['doctorId'];

// Begin a transaction
mysqli_begin_transaction($conn);

try {
    // Delete the doctor's record from the archive
    $query = "DELETE FROM archive_doctor WHERE DoctorID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $doctorId);
    mysqli_stmt_execute($stmt);

    // Commit the transaction
    mysqli_commit($conn);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    // Rollback the transaction in case of error
    mysqli_rollback($conn);
    echo json_encode(['success' => false, 'message' => 'An error occurred']);
}

// Close the database connection
mysqli_close($conn);
?>
