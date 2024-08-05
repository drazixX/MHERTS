<?php
include '../connection/conn.php';

// Check if the file ID is provided in the request
if(isset($_GET['file_id'])) {
    // Get the file ID from the request
    $file_id = $_GET['file_id'];

    // Assuming you have a function to fetch the preview image URL based on the file ID
    $preview_image_url = get_preview_image_url($file_id);

    // Prepare the response
    $response = [
        'success' => true,
        'previewImageUrl' => $preview_image_url
    ];
} else {
    // If file ID is not provided in the request, return an error response
    $response = [
        'success' => false,
        'message' => 'File ID is missing in the request.'
    ];
}

// Set the response headers
header('Content-Type: application/json');

// Send the JSON response
echo json_encode($response);

// Function to fetch the preview image URL based on the file ID
function get_preview_image_url($file_id) {
    // Replace this with your logic to fetch the preview image URL from the database or filesystem
    // Example:
    // $preview_image_url = fetch_preview_image_url_from_database($file_id);
    // or
    // $preview_image_url = fetch_preview_image_url_from_filesystem($file_id);

    // For demonstration, let's assume the preview image URL is stored in a variable or fetched from a database
    $preview_image_url = '../public/assets/documents/' . $file_id . '_preview.jpg';
    return $preview_image_url;
}
?>
