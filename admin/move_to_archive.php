<?php
// Include database connection
include 'connection/conn.php';

if (isset($_POST['staff_id'])) {
    $staff_id = $_POST['staff_id'];

    // Fetch data from clinic_staff
    $query = "SELECT * FROM clinic_staff WHERE staff_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Insert data into archive_staff
        $row = $result->fetch_assoc();
        $insert_query = "INSERT INTO archive_staff (staff_id, employee_id, firstName, middleName, lastName, birthDate, age, gender, email, address, educ_attainment, joinDate, image, mobile) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param('iissssssssssss', $row['staff_id'], $row['employee_id'], $row['firstName'], $row['middleName'], $row['lastName'], $row['birthDate'], $row['age'], $row['gender'], $row['email'], $row['address'], $row['educ_attainment'], $row['joinDate'], $row['image'], $row['mobile']);
        $insert_stmt->execute();

        // Delete data from clinic_staff
        $delete_query = "DELETE FROM clinic_staff WHERE staff_id = ?";
        $delete_stmt = $conn->prepare($delete_query);
        $delete_stmt->bind_param('i', $staff_id);
        $delete_stmt->execute();

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Staff not found']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
