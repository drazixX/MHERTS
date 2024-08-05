<?php
include('./connection/conn.php');

// Get the doctor ID from the request
$doctorId = $_POST['doctorId'];

// Begin a transaction
mysqli_begin_transaction($conn);

try {
    // Fetch the doctor's details from the archive
    $query = "SELECT * FROM archive_doctor WHERE DoctorID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $doctorId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Insert the doctor's details into the doctors table
        $query = "INSERT INTO doctors (DoctorID, Title, FirstName, MiddleName, LastName, DateOfBirth, Age, Gender, Address, Mobile, Email, Specialization, Status, JoinDate, File) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "isssssssssissss", $row['DoctorID'], $row['Title'], $row['FirstName'], $row['MiddleName'], $row['LastName'], $row['DateOfBirth'], $row['Age'], $row['Gender'], $row['Address'], $row['Mobile'], $row['Email'], $row['Specialization'], $row['Status'], $row['JoinDate'], $row['File']);
        mysqli_stmt_execute($stmt);

        // Delete the doctor's record from the archive
        $query = "DELETE FROM archive_doctor WHERE DoctorID = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $doctorId);
        mysqli_stmt_execute($stmt);

        // Commit the transaction
        mysqli_commit($conn);

        echo json_encode(['success' => true]);
    } else {
        // Rollback the transaction if doctor not found in archive
        mysqli_rollback($conn);
        echo json_encode(['success' => false, 'message' => 'Doctor not found in archive']);
    }
} catch (Exception $e) {
    // Rollback the transaction in case of error
    mysqli_rollback($conn);
    echo json_encode(['success' => false, 'message' => 'An error occurred']);
}

// Close the database connection
mysqli_close($conn);
?>
