<?php
include './connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['staff_id'];

    // Fetch the data from archive_staff
    $query = "SELECT * FROM archive_staff WHERE staff_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Insert the data into clinic_staff
        $insert_query = "INSERT INTO clinic_staff (staff_id, firstName, middleName, lastName, email, address, educ_attainment, joinDate, image, mobile)
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param('isssssssss', 
            $row['staff_id'], $row['firstName'], $row['middleName'], $row['lastName'],
            $row['email'], $row['address'], $row['educ_attainment'], $row['joinDate'],
            $row['image'], $row['mobile']);
        
        if ($insert_stmt->execute()) {
            // Delete the data from archive_staff
            $delete_query = "DELETE FROM archive_staff WHERE staff_id = ?";
            $delete_stmt = $conn->prepare($delete_query);
            $delete_stmt->bind_param('i', $staff_id);
            if ($delete_stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Staff restored successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete from archive.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to restore staff.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Staff not found in archive.']);
    }
    $stmt->close();
    $conn->close();
}
?>
