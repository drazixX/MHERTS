<?php
// Include database connection file
include_once './connection/conn.php';

// Set content type to JSON
header('Content-Type: application/json');

// Query to fetch appointments
$sql = "SELECT A_Id, Title, CONCAT(FirstName, ' ', LastName) AS title, DateOfAppointment AS start, EndTime AS end 
        FROM appointments";
$result = $conn->query($sql);

// Initialize an array to hold events
$events = [];

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'id' => $row['A_Id'],
            'title' => $row['title'],
            'start' => $row['start'],
            'end' => $row['end']
        ];
    }
}

// Close the database connection
$conn->close();

// Output the JSON-encoded events
echo json_encode($events);
?>
