<?php
include '../connection/conn.php'; 

// Check if file_id and file_name parameters are provided in the URL
if(isset($_GET['file_id']) && isset($_GET['file_name'])) {
    // Get the file_id and file_name from the URL parameters
    $file_id = $_GET['file_id'];
    $file_name = $_GET['file_name'];
    
    // Define the directory where files are stored
    $save_path = './public/assets/documents/'; // Update this path to match your file storage directory
    
    // Set the full path of the file
    $file_path = $save_path . '/' . $file_name;
    
    // Check if the file exists
    if(file_exists($file_path)) {
        // Set appropriate header for displaying PDF content
        header('Content-Type: application/pdf');
        
        // Output the file content directly to the browser
        readfile($file_path);
        exit();
    } else {
        // File not found
        echo "File not found.";
    }
} else {
    // File_id or file_name parameter not provided
    echo "File_id or file_name parameter not provided.";
}
?>
