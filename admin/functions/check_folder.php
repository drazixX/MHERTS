<?php
include '../connection/conn.php';

// Check if the folder name and patient ID are set and not empty
if(isset($_POST['folderName']) && !empty($_POST['folderName']) && isset($_POST['familyrec_id']) && !empty($_POST['familyrec_id'])) {
    // Get the folder name and patient ID from the POST data
    $folderName = $_POST['folderName'];
    $familyrec_id = $_POST['familyrec_id'];

    // Prepare and execute the SQL query to check if the folder name already exists for the patient
    $sql = "SELECT * FROM preg_history WHERE folder_name = '$folderName' AND FamilyRec_Id = $familyrec_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Folder with the same name already exists for this patient
        echo 'exists';
    } else {
        // Folder name does not exist for this patient
        echo 'not_exists';
    }
} else {
    // Invalid request
    echo 'invalid_request';
}

// Close the database connection
$conn->close();
?>
