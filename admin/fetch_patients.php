<?php
include './connection/conn.php';

// Query to join tables and fetch relevant patient details
$query = "
    SELECT pm.FamilyRec_Id, 
           CONCAT(pm.Title, ' ', pm.First_Name, ' ', pm.Last_Name) AS PatientName,
           GROUP_CONCAT(DISTINCT CONCAT('Obs: ', oh.BloodType, ', ', oh.PregNo) SEPARATOR '; ') AS Observations,
           GROUP_CONCAT(DISTINCT CONCAT('Cond: ', mh.Conditions, ', ', mh.DiagnosisDate) SEPARATOR '; ') AS MedicalHistory
    FROM patients_mother pm
    LEFT JOIN pderls pd ON pm.FamilyRec_Id = pd.FamilyRec_Id
    LEFT JOIN obs_history oh ON pm.FamilyRec_Id = oh.FamilyRec_Id
    LEFT JOIN medicalhistory mh ON pm.FamilyRec_Id = mh.FamilyRec_Id
    GROUP BY pm.FamilyRec_Id, pm.Title, pm.First_Name, pm.Last_Name
";

$result = $conn->query($query);

$patients = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $patients[] = array(
            'FamilyRec_Id' => $row['FamilyRec_Id'],
            'PatientName' => $row['PatientName'],
            'Observations' => $row['Observations'],
            'MedicalHistory' => $row['MedicalHistory']
        );
    }
}

echo json_encode($patients);

$conn->close();
?>
