<?php
include '../connection/conn.php';

session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'administrator') {
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}

$file_id = $conn->real_escape_string($_GET['file_id']);
$newName = $conn->real_escape_string($_GET['newName']);
$history_id = $conn->real_escape_string($_GET['history_id']);
$FamilyRec_Id = $conn->real_escape_string($_GET['FamilyRec_Id']);
$folder_name = $conn->real_escape_string($_GET['folder_name']);

if ($file_id != '' && $newName != '' && $history_id != '' && $FamilyRec_Id != '' && $folder_name != '') {
    $query = "UPDATE preg_files SET file_name = '$newName' WHERE file_id = '$file_id' AND history_id = '$history_id' AND FamilyRec_Id = '$FamilyRec_Id'";
    
    $result = $conn->query($query);
    
    if ($result === true) {
        $_SESSION['message'] = 'File name has been updated!';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = 'File not found or not updated!';
        $_SESSION['success'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Error updating file name. Please try again later.';
    $_SESSION['success'] = 'danger';
}

// Redirect back to the previous page with appropriate parameters
header("Location: ../view_preg_history.php?FamilyRec_Id=" . urlencode($FamilyRec_Id) . "&history_id=" . urlencode($history_id) . "&folder_name=" . urlencode($folder_name));
exit;

$conn->close();
?>
