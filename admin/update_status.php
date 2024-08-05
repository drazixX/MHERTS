<?php
include_once "connection/conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctorID = $_POST['DoctorID'];
    $status = $_POST['Status'];

    if ($status == 'Resigned') {
        // Begin transaction
        mysqli_begin_transaction($conn);

        try {
            // Get doctor's data
            $sql_select = "SELECT * FROM doctors WHERE DoctorID = ?";
            $stmt_select = $conn->prepare($sql_select);
            $stmt_select->bind_param('i', $doctorID);
            $stmt_select->execute();
            $result = $stmt_select->get_result();
            $doctor = $result->fetch_assoc();

            // Insert into archive_doctor
            $sql_insert = "INSERT INTO archive_doctor (DoctorID, Title, FirstName, MiddleName, LastName, DateOfBirth, Age, Gender, Address, Mobile, Email, Specialization, Status, JoinDate, File)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param('isssssissssssss', $doctor['DoctorID'], $doctor['Title'], $doctor['FirstName'], $doctor['MiddleName'], $doctor['LastName'], $doctor['DateOfBirth'], $doctor['Age'], $doctor['Gender'], $doctor['Address'], $doctor['Mobile'], $doctor['Email'], $doctor['Specialization'], $doctor['Status'], $doctor['JoinDate'], $doctor['File']);
            $stmt_insert->execute();

            // Delete from doctors table
            $sql_delete = "DELETE FROM doctors WHERE DoctorID = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param('i', $doctorID);
            $stmt_delete->execute();

            // Commit transaction
            mysqli_commit($conn);

            echo 'success';
        } catch (Exception $e) {
            // Rollback transaction if something goes wrong
            mysqli_rollback($conn);
            echo 'error';
        }

        $stmt_select->close();
        $stmt_insert->close();
        $stmt_delete->close();
    } else {
        // Update status in doctors table
        $sql_update = "UPDATE doctors SET Status = ? WHERE DoctorID = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param('si', $status, $doctorID);

        if ($stmt_update->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }

        $stmt_update->close();
    }

    $conn->close();
} else {
    echo 'Invalid request';
}
?>
