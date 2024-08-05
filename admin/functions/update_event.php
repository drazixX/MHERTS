<?php
// Include your database connection file here
include_once '../connection/conn.php';

// Check if the required parameters are set
if (isset($_POST['event_id'], $_POST['event_date'], $_POST['event_time'])) {
    $event_id = $_POST['event_id'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];

    // Prepare and execute the SQL update statement for the calendar table
    $stmt = $pdo->prepare("UPDATE calendar SET event_date = :event_date, event_time = :event_time WHERE id = :event_id");
    $stmt->bindParam(':event_id', $event_id);
    $stmt->bindParam(':event_date', $event_date);
    $stmt->bindParam(':event_time', $event_time);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(['success' => true]);
    } else {
        // Return error response
        echo json_encode(['success' => false, 'message' => 'Failed to update calendar event']);
    }
} else {
    // Return error response if parameters are missing
    echo json_encode(['success' => false, 'message' => 'Missing parameters']);
}
?>
