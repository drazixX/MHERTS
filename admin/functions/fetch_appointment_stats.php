<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include './connection/conn.php';

// Query to get the number of appointments per day
$query = "SELECT DATE(DateOfAppointment) as date, COUNT(*) as count FROM appointments GROUP BY DATE(DateOfAppointment)";
$result = $conn->query($query);

if (!$result) {
    // Output any SQL errors
    echo json_encode(['error' => $conn->error]);
    exit;
}

// Initialize arrays for labels and data
$dates = [];
$counts = [];

while ($row = $result->fetch_assoc()) {
    $dates[] = $row['date'];
    $counts[] = $row['count'];
}

// Set the header for JSON output
header('Content-Type: application/json');
echo json_encode(['dates' => $dates, 'counts' => $counts]);

// Close the database connection
$conn->close();
?>
