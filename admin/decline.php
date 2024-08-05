<?php
// Include database connection
include_once './connection/conn.php';

// Check if appointment ID and decline reason are provided via POST
if(isset($_POST['A_Id'], $_POST['declineReason'])) {
    // Sanitize input to prevent SQL injection
    $appointment_id = mysqli_real_escape_string($conn, $_POST['A_Id']);
    $declineReason = mysqli_real_escape_string($conn, $_POST['declineReason']);

    // Query to update the appointments table to mark the appointment as declined (accepted = 0)
    $update_query = "UPDATE appointments SET accepted = 0 WHERE A_Id = '$appointment_id'";

    if(mysqli_query($conn, $update_query)) {
        // Query to insert appointment data into the archive_app table
        $insert_query = "INSERT INTO archive_app (A_Id, title, firstName, lastName, dateofappointment, startTime, endTime, address, mobile, email, consult_doc, `conditions`, note, declineReason, declineDate)
                         SELECT A_Id, title, firstName, lastName, dateofappointment, startTime, endTime, address, mobile, email, consult_doc, `conditions`, note, '$declineReason', NOW()
                         FROM appointments
                         WHERE A_Id = '$appointment_id'";

        if(mysqli_query($conn, $insert_query)) {
            // Appointment declined and archived successfully
            header('Location: appointment.php');
            echo "Appointment declined and archived successfully.";
        } else {
            // Error inserting into archive_app table
            echo "Error archiving appointment: " . mysqli_error($conn);
        }
    } else {
        // Error updating appointments table
        echo "Error declining appointment: " . mysqli_error($conn);
    }
} else {
    // Appointment ID or decline reason not provided
    echo "Appointment ID or decline reason not provided.";
}
?>
