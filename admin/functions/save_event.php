<?php
// Database connection
include '../connection/conn.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the event details from the POST data
    $eventId = $_POST['id'];
    $eventDate = $_POST['event_date'];
    $eventTime = $_POST['event_time'];

    // Prepare and execute the SQL query to insert the event into the calendar table
    $query = "INSERT INTO calendar (event_id, event_date, event_time) VALUES (?, ?, ?)";
    $statement = $conn->prepare($query);
    $statement->bind_param("iss", $eventId, $eventDate, $eventTime);
    $result = $statement->execute();

    // Check if the query was successful
    if ($result) {
        // Event insertion successful
        echo json_encode(array("success" => true, "message" => "Event saved successfully."));
    } else {
        // Event insertion failed
        echo json_encode(array("success" => false, "message" => "Failed to save event."));
    }
} else {
    // Invalid request method
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}

// Close the database connection
$conn->close();
?>
