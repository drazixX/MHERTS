<?php
session_start();
include '../connection/conn.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'administrator') {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

// Sanitize input to prevent SQL injection
$id = $conn->real_escape_string($_GET['arc_id']);

if ($id != '') {
    // Delete from appointments table
    $query_appointments = "DELETE FROM appointments WHERE A_Id = '$id'";
    $result_appointments = $conn->query($query_appointments);
    
    // Delete from archive_app table
    $query_archive = "DELETE FROM archive_app WHERE A_Id = '$id'";
    $result_archive = $conn->query($query_archive);

    // Check if both deletions were successful
    if ($result_appointments === true && $result_archive === true) {
        $_SESSION['message'] = 'Appointment has been permanently deleted!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'Failed to permanently delete the appointment!';
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Missing Archive ID!';
    $_SESSION['success'] = 'danger';
}

// Redirect back to the page
header("Location: ../archive_app.php");
$conn->close();
?>
