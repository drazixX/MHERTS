<?php 
	include '../connection/conn.php';

	if(!isset($_SESSION['username']) && $_SESSION['role']!='administrator'){
		if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	
	$file_id = $conn->real_escape_string($_GET['file_id']);
    $history_id = $conn->real_escape_string($_GET['history_id']);
    $FamilyRec_Id = $conn->real_escape_string($_GET['FamilyRec_Id']);
    $folder_name = $conn->real_escape_string($_GET['folder_name']);


	if($file_id != '' && $history_id != '' && $FamilyRec_Id != '' && $folder_name != ''){
		
		$query 		= "DELETE FROM preg_files WHERE file_id = '$file_id' AND history_id = '$history_id' AND FamilyRec_Id = '$FamilyRec_Id'";
		
		$result 	= $conn->query($query);
		
		if($result === true){
            $_SESSION['message'] = 'File has been removed!';
            $_SESSION['success'] = 'danger';
            
        }else{
            $_SESSION['message'] = 'File not found or already deleted!';
            $_SESSION['success'] = 'danger';
        }
	}else{

        $_SESSION['message'] = 'Error deleting file. Please try again later.';
		$_SESSION['success'] = 'danger';
	}

	// Redirect back to the previous page with appropriate parameters
    header("Location: ../view_preg_history.php?FamilyRec_Id=" . urlencode($FamilyRec_Id) . "&history_id=" . urlencode($history_id) . "&folder_name=" . urlencode($folder_name));
    exit;
	$conn->close();

