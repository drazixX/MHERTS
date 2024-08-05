<?php
include './connection/conn.php';

// Retrieve JSON data from POST request
$data = json_decode(file_get_contents('php://input'), true);

// Validate and process incoming data
if (isset($data['id']) && isset($data['start'])) {
    $id = $data['id'];
    $start = $data['start'];
    $end = isset($data['end']) ? $data['end'] : null;

    // Prepare SQL statement
    $sql = "UPDATE events SET start = ?, end = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute statement
    $stmt->bind_param('ssi', $start, $end, $id);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data']);
}
?>
