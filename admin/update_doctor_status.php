<?php
include_once "connection/conn.php";

// Check if doctorId and status are set
if (isset($_POST['doctorId']) && isset($_POST['status'])) {
    $doctorId = $_POST['doctorId'];
    $status = $_POST['status'];

    // Update the doctor's status
    $sql = "UPDATE doctors SET Status = ? WHERE DoctorID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $doctorId);

    if ($stmt->execute()) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    $stmt->close();
} else {
    $response = array("success" => false, "message" => "Invalid input");
}

// Close database connection
$conn->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
