<?php
// Include database connection
include '../connection/conn.php';

// Check if status is sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status']) && isset($_POST['FamilyRec_Id'])) {
    // Sanitize and validate the input
    $selectedStatus = $_POST['status'];
    $FamilyRec_Id = $_POST['FamilyRec_Id'];

    // Fetch the lab_status corresponding to the chosen colabel_status
    $sql_fetch_lab_status = "SELECT lab_status FROM colabel_status WHERE status = ?";
    $stmt_fetch_lab_status = $conn->prepare($sql_fetch_lab_status);

    // Check if prepare() succeeded
    if (!$stmt_fetch_lab_status) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameter for lab_status query
    $stmt_fetch_lab_status->bind_param("s", $selectedStatus);

    // Execute the query
    if (!$stmt_fetch_lab_status->execute()) {
        die("Error executing statement: " . $stmt_fetch_lab_status->error);
    }

    // Store the result
    $stmt_fetch_lab_status->store_result();

    // Bind result variable
    $stmt_fetch_lab_status->bind_result($lab_status);

    // Fetch the lab_status value
    $stmt_fetch_lab_status->fetch();

    // Close the statement
    $stmt_fetch_lab_status->close();

    // Check if data exists for the provided FamilyRec_Id in patient_status table
    $sql_check_status = "SELECT status FROM patient_status WHERE FamilyRec_Id = ?";
    $stmt_check_status = $conn->prepare($sql_check_status);

    // Check if prepare() succeeded
    if (!$stmt_check_status) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameter for status check query
    $stmt_check_status->bind_param("i", $FamilyRec_Id);

    // Execute the query
    if (!$stmt_check_status->execute()) {
        die("Error executing statement: " . $stmt_check_status->error);
    }

    // Store the result
    $stmt_check_status->store_result();

    // If no data exists for the provided FamilyRec_Id, insert it
    if ($stmt_check_status->num_rows === 0) {
        $sql_insert_status = "INSERT INTO patient_status (FamilyRec_Id, status) VALUES (?, ?)";
        $stmt_insert_status = $conn->prepare($sql_insert_status);

        // Check if prepare() succeeded
        if (!$stmt_insert_status) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters and execute the insert query
        $stmt_insert_status->bind_param("is", $FamilyRec_Id, $lab_status);
        if ($stmt_insert_status->execute()) {
            echo "Status inserted successfully."; // You can echo any response you want
        } else {
            echo "Error inserting status: " . $stmt_insert_status->error;
        }

        // Close the statement
        $stmt_insert_status->close();
    } else {
        // Data exists, proceed with updating the status
        // Prepare the update query
        $sql_update_status = "UPDATE patient_status SET status = ? WHERE FamilyRec_Id = ?";
        $stmt_update_status = $conn->prepare($sql_update_status);

        // Check if prepare() succeeded
        if (!$stmt_update_status) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters and execute the update query
        $stmt_update_status->bind_param("si", $lab_status, $FamilyRec_Id);
        if ($stmt_update_status->execute()) {
            echo "Status updated successfully."; // You can echo any response you want
        } else {
            echo "Error updating status: " . $stmt_update_status->error;
        }

        // Close statement
        $stmt_update_status->close();
    }

    // Close statement and connection
    $stmt_check_status->close();
    $conn->close();
} else {
    // If status is not sent via POST, return an error
    echo "Error: Status not provided.";
}
?>
