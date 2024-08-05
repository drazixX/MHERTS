<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include_once '../connection/conn.php';

    // Retrieve form data
    $event_name = $_POST['category-name'];
    $event_color = $_POST['category-color'];

    // Perform SQL insertion
    $sql = "INSERT INTO events (event_name, event_color) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $event_name, $event_color);

    // Execute the statement
    if ($stmt->execute()) {
        // Event added successfully
        header("Location: ../app_calendar.php");
        // echo "Event added successfully.";
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>
