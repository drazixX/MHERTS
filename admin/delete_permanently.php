<?php
include './connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];

    // Delete the data from archive_staff
    $query = "DELETE FROM archive_staff WHERE staff_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $staff_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Staff deleted permanently.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete staff.']);
    }

    $stmt->close();
    $conn->close();
}
?>
