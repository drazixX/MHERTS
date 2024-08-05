<?php
session_start();
include_once '../connection/conn.php';

if (isset($_GET['FamilyRec_Id'])) {
    $FamilyRec_Id = mysqli_real_escape_string($conn, $_GET['FamilyRec_Id']);

    if (!empty($FamilyRec_Id)) {
        mysqli_autocommit($conn, false);
        mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS = 0');

        $archive_success = true;

        // Define the insert and delete queries for each table
        $queries = [
            'preg_files' => [
                'archive_table' => 'archive_pfiles',
                'columns' => 'file_id, file_name, file_type, file_size, date_of_insertion, save_path, FamilyRec_Id, history_id'
            ],
            'medicalhistory' => [
                'archive_table' => 'archive_mh',
                'columns' => 'MH_Id, FamilyRec_Id, Conditions, DiagnosisDate, Treatment, Medications, Surgeries'
            ],
            'obs_history' => [
                'archive_table' => 'archive_oh',
                'columns' => 'Obs_Id, FamilyRec_Id, G, F, PregNo, LMP, EDC, EDD, BloodType, PhilHNo'
            ],
            'pdrels' => [
                'archive_table' => 'archive_pdrels',
                'columns' => 'rel_Id, FamilyRec_Id, DoctorID, note'
            ],
            'spouseinformation' => [
                'archive_table' => 'archive_sinfo',
                'columns' => 'Spouse_Id, FamilyRec_Id, Name, Age, BloodType, Src_Income'
            ],
            'patients_mother' => [
                'archive_table' => 'archive_patient',
                'columns' => 'FamilyRec_Id, Title, First_Name, Middle_Name, Last_Name, DateOfBirth, Age, Civil_Status, Address, Phone, Educ_level, Occupation, Religion, Date_CheckIn, Doc_Assigned'
            ]
        ];

        foreach ($queries as $table => $query) {
            $archive_table = $query['archive_table'];
            $columns = $query['columns'];

            $insert_query = "INSERT INTO $archive_table ($columns) SELECT $columns FROM $table WHERE FamilyRec_Id = '$FamilyRec_Id'";
            if (mysqli_query($conn, $insert_query)) {
                $delete_query = "DELETE FROM $table WHERE FamilyRec_Id = '$FamilyRec_Id'";
                if (!mysqli_query($conn, $delete_query)) {
                    $archive_success = false;
                    $_SESSION['message'] = 'Error deleting from ' . $table . ': ' . mysqli_error($conn);
                    $_SESSION['success'] = 'danger';
                    break;
                }
            } else {
                $archive_success = false;
                $_SESSION['message'] = 'Error archiving from ' . $table . ': ' . mysqli_error($conn);
                $_SESSION['success'] = 'danger';
                break;
            }
        }

        if ($archive_success) {
            mysqli_commit($conn);
            $_SESSION['message'] = 'All records have been archived and removed successfully!';
            $_SESSION['success'] = 'success';
        } else {
            mysqli_rollback($conn);
        }

        mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS = 1');
        header("Location: ../view_preg_history.php?FamilyRec_Id=" . urlencode($FamilyRec_Id));
        exit;
    } else {
        $_SESSION['message'] = 'FamilyRec_Id is required.';
        $_SESSION['success'] = 'danger';
        header("Location: ../appointment.php");
        exit;
    }
} else {
    $_SESSION['message'] = 'Required parameters not provided.';
    $_SESSION['success'] = 'danger';
    header("Location: ../patient_list.php");
    exit;
}

mysqli_close($conn);
?>
