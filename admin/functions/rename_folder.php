<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include_once "../connection/conn.php";

    // Get the new folder name, familyrec_id, and history_id from the POST data
    $refolderName = $_POST['refolderName'];
    $familyrec_id = $_POST['familyrec_id'];
    $history_id = $_POST['history_id'];

    // Prepare and execute the SQL query to update the folder name and date modified
    $sql = "UPDATE preg_history SET folder_name = ?, date_modified = NOW() WHERE FamilyRec_Id = ? AND history_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $refolderName, $familyrec_id, $history_id);

    if ($stmt->execute()) {
        // If the query is successful, return a success message
        echo "Folder renamed successfully.";
    } else {
        // If the query fails, return an error message
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST, return an error message
    echo "Invalid request method.";
}
?>
