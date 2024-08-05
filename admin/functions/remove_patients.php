<?php 
session_start();
include '../connection/conn.php';

if(!isset($_SESSION['username']) || $_SESSION['role']!='administrator'){
    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

$id = $conn->real_escape_string($_GET['familyrec_id']);

if($id != ''){
    // Delete from medicalhistory table first
    $query_medicalhistory = "DELETE FROM medicalhistory WHERE FamilyRec_Id = '$id'";
    $result_medicalhistory = $conn->query($query_medicalhistory);
    
    // If deletion from medicalhistory is successful, proceed to delete from patients table
    if($result_medicalhistory === true){
        $query_patients = "DELETE FROM patients_mother WHERE FamilyRec_Id = '$id'";
        $result_patients = $conn->query($query_patients);
        
        if($result_patients === true){
            $_SESSION['message'] = 'User and associated medical history have been removed!';
            $_SESSION['success'] = 'danger';
        }else{
            $_SESSION['message'] = 'Failed to remove user!';
            $_SESSION['success'] = 'danger';
        }
    }else{
        $_SESSION['message'] = 'Failed to remove associated medical history!';
        $_SESSION['success'] = 'danger';
    }
}else{
    $_SESSION['message'] = 'Missing User ID!';
    $_SESSION['success'] = 'danger';
}

header("Location: ../patient_list.php");
$conn->close();
?>
