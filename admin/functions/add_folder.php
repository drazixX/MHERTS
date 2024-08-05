<?php
include '../connection/conn.php';

// Check if the folder name and patient ID are set and not empty
if(isset($_POST['folderName']) && !empty($_POST['folderName']) && isset($_POST['familyrec_id']) && !empty($_POST['familyrec_id'])) {
    // Get the folder name and patient ID from the POST data
    $folderName = $_POST['folderName'];
    $familyrec_id = $_POST['familyrec_id'];

    // Prepare and execute the SQL query to insert the folder into the preg_history table
    $sql = "INSERT INTO preg_history (FamilyRec_Id, folder_name) VALUES ('$familyrec_id', '$folderName')";
    if ($conn->query($sql) === TRUE) {
        // Return a success message if the query is successful
        echo "Folder added successfully.";
        
    } else {
        // Return an error message if the query fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
