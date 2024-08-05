<?php
session_start();
include '../connection/conn.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'administrator') {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

// Sanitize input to prevent SQL injection
$id = $conn->real_escape_string($_POST['restore_id']);

if ($id != '') {
    // Fetch the appointment data from archive_app table
    $query_fetch = "SELECT * FROM archive_app WHERE A_Id = '$id'";
    $result_fetch = $conn->query($query_fetch);

    if ($result_fetch->num_rows > 0) {
        $row = $result_fetch->fetch_assoc();

        // Insert the appointment data back into the appointments table
        $query_restore = "INSERT INTO appointments (firstName, lastName, email, DateOfAppointment, startTime, endtime, mobile, Consult_doc, conditions) 
                          VALUES ('" . $row['firstName'] . "', '" . $row['lastName'] . "', '" . $row['email'] . "', 
                          '" . $row['DateOfAppointment'] . "',  '" . $row['startTime'] . "', '" . $row['endTime'] . "','" . $row['mobile'] . "', '" . $row['Consult_doc'] . "', 
                          '" . $row['conditions'] . "')";

        $result_restore = $conn->query($query_restore);

        if ($result_restore === true) {
            // Delete the appointment data from archive_app table
            $query_delete = "DELETE FROM archive_app WHERE A_Id = '$id'";
            $result_delete = $conn->query($query_delete);

            if ($result_delete === true) {
                $_SESSION['message'] = 'Appointment has been restored!';
                $_SESSION['success'] = 'success';
            } else {
                $_SESSION['message'] = 'Failed to delete from archive!';
                $_SESSION['success'] = 'danger';
            }
        } else {
            $_SESSION['message'] = 'Failed to restore appointment!';
            $_SESSION['success'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'Appointment not found in archive!';
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Missing Restore ID!';
    $_SESSION['success'] = 'danger';
}

header("Location: ../archive_app.php");
$conn->close();
?>
