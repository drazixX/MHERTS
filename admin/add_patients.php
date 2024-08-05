<?php
include_once "connection/conn.php";

// Get last patient ID from the database
$sql_last_patient_id = "SELECT MAX(PatientID) AS LastPatientID FROM Patients";
$result_last_patient_id = $conn->query($sql_last_patient_id);
$last_patient_id_row = $result_last_patient_id->fetch_assoc();
$last_patient_id = $last_patient_id_row['LastPatientID'];

// Generate new patient ID
$current_year_month = date('Y-m');
if ($last_patient_id == null || substr($last_patient_id, 0, 2) != $current_year_month) {
    // If there are no existing patient IDs for the current year and month, start with 0000001
    $new_patient_id = $last_patient_id + 1;
} else {
    // Increment the last patient ID number
    $new_patient_id = $last_patient_id + 1;
}

// Format patient ID
$formatted_patient_id = $current_year_month . str_pad($new_patient_id, 4, '0', STR_PAD_LEFT);

// Get data from POST request and sanitize inputs
$inputs = ['title', 'firstName', 'middleName', 'lastName', 'dateOfBirth', 'gender', 'civilStatus', 'trimester', 'address', 'phone', 'email', 'obstetricHistory', 'dateCheckIn', 'doctorAssigned'];
foreach ($inputs as $input) {
    $$input = mysqli_real_escape_string($conn, $_POST[$input] ?? '');
}

// Calculate age based on Date of Birth
$today = new DateTime();
$birthDate = new DateTime($dateOfBirth);
$age = $today->diff($birthDate)->y;

// Prepare SQL statement to insert data into the patients table
$sql_patients = "INSERT INTO patients (PatientID, FormattedPatientID, Title, FirstName, MiddleName, LastName, DateOfBirth, Age, Gender, CivilStatus, Trimester, Address, Phone, Email, ObstetricHistory, DateCheckIn, DoctorAssigned)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Use prepared statement to insert patient data
$stmt = $conn->prepare($sql_patients);
$stmt->bind_param("issssssssssssssss", $new_patient_id, $formatted_patient_id, $title, $firstName, $middleName, $lastName, $dateOfBirth, $age, $gender, $civilStatus, $trimester, $address, $phone, $email, $obstetricHistory, $dateCheckIn, $doctorAssigned);

if ($stmt->execute()) {
    $patientId = $stmt->insert_id; // Get the auto-generated patient ID
    $hasMedicalHistory = $_POST['MedicalHistory'] ?? 'no';

    // If patient has medical history, insert into medicalhistory table
    if ($hasMedicalHistory === 'yes') {
        $conditions = mysqli_real_escape_string($conn, $_POST['conditions'] ?? '');
        $diagnosis = mysqli_real_escape_string($conn, $_POST['diagnosisDate'] ?? '');
        $treatment = mysqli_real_escape_string($conn, $_POST['treatment'] ?? '');
        $medications = mysqli_real_escape_string($conn, $_POST['medications'] ?? '');
        $surgeries = mysqli_real_escape_string($conn, $_POST['surgeries'] ?? '');

        $sql_medicalhistory = "INSERT INTO medicalhistory (PatientID, Conditions, DiagnosisDate, Treatment, Medications, Surgeries) 
                               VALUES (?, ?, ?, ?, ?, ?)";

        // Use prepared statement to insert medical history data
        $stmt_medical = $conn->prepare($sql_medicalhistory);
        $stmt_medical->bind_param("isssss", $patientId, $conditions, $diagnosis, $treatment, $medications, $surgeries);

        if ($stmt_medical->execute()) {
             header('Location: patients_list.php');
            echo json_encode(array("status" => "success", "message" => "Patient added successfully"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error: " . $stmt_medical->error));
        }
        $stmt_medical->close();
    } else {
        echo json_encode(array("status" => "success", "message" => "Patient added successfully"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Error: " . $stmt->error));
}

// Close prepared statement
$stmt->close();

?>
