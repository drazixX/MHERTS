<?php 
include '../connection/conn.php';

if(isset($_FILES['file'])) {
    // Get file information
    $file_name = $_FILES['file']['name'];
    $directory = "../public/assets/documents/";
    $save_path = $directory . $file_name;

    // Temporary file location
    $tmp_file = $_FILES['file']['tmp_name'];

    // PatientID and history_id
    $PatientID = $_POST['patientID']; 
    $history_id = $_POST['history_id']; 

    // Move uploaded file to permanent location
    if(move_uploaded_file($tmp_file, $save_path)) {
        // Insert file information into database using prepared statement
        $query = "INSERT INTO preg_files (files, save_path, date_of_insertion, PatientID, history_id)
                  VALUES (?, ?, NOW(), ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssii", $file_name, $save_path, $PatientID, $history_id);
        
        // Execute query
        if(mysqli_stmt_execute($stmt)) {
            // Redirect to patient_details.php
            header("Location: ../patient_details.php?PatientID=$PatientID");
            exit(); // Ensure script stops execution after redirect
        } else {
            // Error handling for SQL query
            echo "Error inserting data into database: " . mysqli_error($conn);
        }
    } else {
        // Error handling for file move operation
        echo "Error moving file to destination.";
    }
}
?>
