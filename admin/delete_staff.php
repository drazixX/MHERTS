<?php
include 'connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staff_id = $_POST['staff_id'];

    // Check if the staff ID is provided
    if (!isset($staff_id)) {
        echo json_encode(['status' => 'error', 'message' => 'Staff ID is required']);
        exit;
    }

    // Fetch the staff data from clinic_staff
    $fetchQuery = "SELECT * FROM clinic_staff WHERE staff_id = ?";
    $stmt = $conn->prepare($fetchQuery);
    $stmt->bind_param('i', $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $staffData = $result->fetch_assoc();

        // Insert the staff data into archive_staff
        $insertQuery = "INSERT INTO archive_staff (staff_id, employee_id, firstName, middleName, lastName, birthDate, age, gender, email, address, educ_attainment, joinDate, image, mobile) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param(
            'isssssisssssss',
            $staffData['staff_id'],
            $staffData['employee_id'],
            $staffData['firstName'],
            $staffData['middleName'],
            $staffData['lastName'],
            $staffData['birthDate'],
            $staffData['age'],
            $staffData['gender'],
            $staffData['email'],
            $staffData['address'],
            $staffData['educ_attainment'],
            $staffData['joinDate'],
            $staffData['image'],
            $staffData['mobile']
        );

        if ($stmt->execute()) {
            // Delete the staff data from clinic_staff
            $deleteQuery = "DELETE FROM clinic_staff WHERE staff_id = ?";
            $stmt = $conn->prepare($deleteQuery);
            $stmt->bind_param('i', $staff_id);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Staff member archived and deleted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete staff member from clinic_staff']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to archive staff member']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Staff member not found']);
    }

    $stmt->close();
    $conn->close();
}
?>
