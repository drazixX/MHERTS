<?php
// Include database connection file
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the FamilyRec_Id from POST request
    $familyRecId = $_POST['familyrec_id'];

    // Check if the FamilyRec_Id is provided
    if (!empty($familyRecId)) {
        // SQL to select data from patients_mother
        $selectSql = "SELECT * FROM patients_mother WHERE FamilyRec_Id = ?";
        $stmt = $conn->prepare($selectSql);
        $stmt->bind_param("i", $familyRecId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch data
            $row = $result->fetch_assoc();

            // SQL to insert data into archive_patient
            $insertSql = "INSERT INTO archive_patient (FamilyRec_Id, FormattedFR_ID, Title, First_Name, Middle_Name, Last_Name, DateOfBirth, Age, Gender, Civil_Status, Address, Phone, Educ_level, Occupation, Religion, Date_CheckIn, Doc_Assigned) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertSql);
            $stmt->bind_param("issssssssssssss", $row['FamilyRec_Id'], $row['FormattedFR_ID'], $row['Title'], $row['First_Name'], $row['Middle_Name'], $row['Last_Name'], $row['DateOfBirth'], $row['Age'], $row['Gender'], $row['Civil_Status'], $row['Address'], $row['Phone'], $row['Educ_level'], $row['Occupation'], $row['Religion'], $row['Date_CheckIn'], $row['Doc_Assigned']);
            $stmt->execute();

            // SQL to delete the data from patients_mother
            $deleteSql = "DELETE FROM patients_mother WHERE FamilyRec_Id = ?";
            $stmt = $conn->prepare($deleteSql);
            $stmt->bind_param("i", $familyRecId);
            $stmt->execute();

            echo "Patient archived successfully.";
        } else {
            echo "No record found.";
        }
    } else {
        echo "FamilyRec_Id is required.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
