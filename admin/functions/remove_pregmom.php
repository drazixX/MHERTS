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
    // Delete from medicalhistory table
    $query_medicalhistory = "DELETE FROM medicalhistory WHERE FamilyRec_Id = ?";
    $stmt_medicalhistory = $conn->prepare($query_medicalhistory);
    $stmt_medicalhistory->bind_param("i", $id);
    $result_medicalhistory = $stmt_medicalhistory->execute();

    // Delete from obs_history table
    $query_obs_history = "DELETE FROM obs_history WHERE FamilyRec_Id = ?";
    $stmt_obs_history = $conn->prepare($query_obs_history);
    $stmt_obs_history->bind_param("i", $id);
    $result_obs_history = $stmt_obs_history->execute();

    // Delete from pdrels table
    $query_pdrels = "DELETE FROM pdrels WHERE FamilyRec_Id = ?";
    $stmt_pdrels = $conn->prepare($query_pdrels);
    $stmt_pdrels->bind_param("i", $id);
    $result_pdrels = $stmt_pdrels->execute();

    // Delete from spouseinformation table
    $query_spouseinformation = "DELETE FROM spouseinformation WHERE FamilyRec_Id = ?";
    $stmt_spouseinformation = $conn->prepare($query_spouseinformation);
    $stmt_spouseinformation->bind_param("i", $id);
    $result_spouseinformation = $stmt_spouseinformation->execute();

     // Delete from obs_history table
     $query_patients_mother = "DELETE FROM patients_mother WHERE FamilyRec_Id = ?";
     $stmt_patients_mother = $conn->prepare($query_patients_mother);
     $stmt_patients_mother->bind_param("i", $id);
     $result_patients_mother = $stmt_patients_mother->execute();
    
    // If deletion is successful for all tables, set session message
    if($result_medicalhistory && $result_obs_history && $result_pdrels && $result_spouseinformation && $result_patients_mother){
        $_SESSION['message'] = 'User and associated records have been removed!';
        $_SESSION['success'] = 'danger';
    }else{
        $_SESSION['message'] = 'Failed to remove user or associated records!';
        $_SESSION['success'] = 'danger';
    }
}else{
    $_SESSION['message'] = 'Missing User ID!';
    $_SESSION['success'] = 'danger';
}

header("Location: ../patient_list.php");
$stmt_medicalhistory->close();
$stmt_obs_history->close();
$stmt_pdrels->close();
$stmt_spouseinformation->close();
$conn->close();
?>
