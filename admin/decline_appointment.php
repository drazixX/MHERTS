<?php
// Include database connection
include_once './connection/conn.php';

// Check if appointment ID and decline reason are provided via POST
if(isset($_POST['A_Id'], $_POST['declineReason'])) {
    // Sanitize input to prevent SQL injection
    $appointment_id = mysqli_real_escape_string($conn, $_POST['A_Id']);
    $declineReason = mysqli_real_escape_string($conn, $_POST['declineReason']);

    // Query to retrieve appointment details
    $sql_select_appointment = "SELECT * FROM appointments WHERE A_Id = $appointment_id";
    $result_select_appointment = mysqli_query($conn, $sql_select_appointment);

    // Check if appointment exists
    if(mysqli_num_rows($result_select_appointment) > 0) {
        $appointment_data = mysqli_fetch_assoc($result_select_appointment);

        // Insert appointment into archive table
        $sql_insert_archive_app = "INSERT INTO archive_app (A_Id, title, firstName, lastName, date, startTime, endTime, address, mobile, email, doctor, condition, note, declineReason, declineDate) VALUES ('$appointment_id', '{$appointment_data['title']}', '{$appointment_data['firstName']}', '{$appointment_data['lastName']}', '{$appointment_data['date']}', '{$appointment_data['startTime']}', '{$appointment_data['endTime']}', '{$appointment_data['address']}', '{$appointment_data['mobile']}', '{$appointment_data['email']}', '{$appointment_data['doctor']}', '{$appointment_data['condition']}', '{$appointment_data['note']}', '$declineReason', NOW())";

        if(mysqli_query($conn, $sql_insert_archive_app)) {
            // Appointment declined and archived successfully
            // Now delete it from appointments table
            $sql_delete_appointment = "DELETE FROM appointments WHERE A_Id = $appointment_id";
            if(mysqli_query($conn, $sql_delete_appointment)) {
                // Appointment deleted successfully
                echo "Appointment declined and archived successfully.";
            } else {
                // Error deleting appointment
                echo "Error deleting appointment: " . mysqli_error($conn);
            }
        } else {
            // Error inserting into archive_app table
            echo "Error archiving appointment: " . mysqli_error($conn);
        }
    } else {
        // No appointment found with the provided ID
        echo "Appointment not found.";
    }
} else {
    // Appointment ID or decline reason not provided
    echo "Appointment ID or decline reason not provided.";
}
?>
