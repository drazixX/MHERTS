<?php
include './connection/conn.php';

// Define function to format file size
function formatSizeUnits($bytes) {
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define target directory
    $directory = './public/assets/documents/';

    // Initialize an array to store file upload status
    $uploadStatus = [];

    // Loop through each uploaded file
    foreach ($_FILES["FormFile"]["name"] as $key => $fileName) {
        // Define target file path
        $targetFile = $directory . basename($fileName);

        // Extract file details
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $fileSize = $_FILES["FormFile"]["size"][$key];

        // Check if file already exists for the associated FamilyRec_Id and history_id
        $stmt_check = $conn->prepare("SELECT COUNT(*) AS count FROM preg_files WHERE file_name = ? AND FamilyRec_Id = ? AND history_id = ?");
        $stmt_check->bind_param("sss", $fileName, $_POST['familyrec_id'], $_POST['history_id']);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result()->fetch_assoc();

        if ($result_check['count'] > 0) {
            // File with the same name already exists for the associated FamilyRec_Id and history_id
            $uploadStatus[] = "File '$fileName' already exists.";
        } else {
            // Allow certain file formats
            $allowedFormats = array("pdf");
            if (!in_array($fileType, $allowedFormats)) {
                $uploadStatus[] = "Sorry, only PDF files are allowed.";
            } else {
                // Move uploaded file to target directory
                if (move_uploaded_file($_FILES["FormFile"]["tmp_name"][$key], $targetFile)) {
                    // Convert file size to KB, MB, or GB
                    $fileSizeFormatted = formatSizeUnits($fileSize);

                    // Now insert file details into database table using PDO
                    $stmt = $conn->prepare("INSERT INTO preg_files (file_name, file_type, file_size, date_of_insertion, save_path, history_id, FamilyRec_Id) VALUES (?, ?, ?, NOW(), ?, ?, ?)");
                    $stmt->execute([$fileName, $fileType, $fileSizeFormatted, $targetFile, $_POST['history_id'], $_POST['familyrec_id']]);

                    $uploadStatus[] = "File '$fileName' uploaded successfully.";
                } else {
                    $uploadStatus[] = "Sorry, there was an error uploading file '$fileName'.";
                }
            }
        }
    }

    // Redirect back to view page with upload status
    header("Location: ./view_preg_history.php?FamilyRec_Id=" . urlencode($_POST['familyrec_id']) . "&history_id=" . urlencode($_POST['history_id']) . "&folder_name=" . urlencode($_POST['folder_name']) . "&upload_status=" . urlencode(json_encode($uploadStatus)));
    exit;
} else {
    // Form not submitted
    echo "Form not submitted.";
}
?>
