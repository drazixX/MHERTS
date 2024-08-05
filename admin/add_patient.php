<?php
include_once "connection/conn.php";

// Get last patient ID from the database
$sql_last_patient_id = "SELECT MAX(PatientID) AS LastPatientID FROM Patients";
$result_last_patient_id = $conn->query($sql_last_patient_id);
$last_patient_id_row = $result_last_patient_id->fetch_assoc();
$last_patient_id = $last_patient_id_row['LastPatientID'];

// Generate new patient ID
$current_year_month = date('Y-m');
if ($last_patient_id == null || substr($last_patient_id, 0, 7) != $current_year_month) {
    // If there are no existing patient IDs for the current year and month, start with 0000001
    $new_patient_id = $last_patient_id + 1;
} else {
    // Increment the last patient ID number
    $new_patient_id = $last_patient_id + 1;
}

// Format patient ID
$formatted_patient_id = $current_year_month . str_pad($new_patient_id, 4, '0', STR_PAD_LEFT);


// Define the array of inputs to sanitize
$inputs = ['Title', 'FirstName', 'MiddleName', 'LastName', 'DateOfBirth', 'Gender', 'CivilStatus', 'Trimester', 'Address', 'Phone', 'Email', 'ObstetricHistory', 'DateCheckIn', 'DoctorAssigned'];

// Initialize an associative array to hold sanitized input values
$sanitizedInputs = [];

// Iterate through each input and sanitize its value
foreach ($inputs as $input) {
    // Use mysqli_real_escape_string to sanitize input value
    $sanitizedInputs[$input] = mysqli_real_escape_string($conn, $_POST[$input] ?? '');
}

// Calculate age based on Date of Birth
$today = new DateTime();
$birthDate = new DateTime($sanitizedInputs['DateOfBirth']);
$age = $today->diff($birthDate)->y;

// Prepare SQL statement to insert data into the patients table
$sql_patients = "INSERT INTO patients (FormattedPatientID, Title, FirstName, MiddleName, LastName, DateOfBirth, Age, Gender, CivilStatus, Trimester, Address, Phone, Email, ObstetricHistory, DateCheckIn, DoctorAssigned)
        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Use prepared statement to insert patient data
$stmt = $conn->prepare($sql_patients);
$stmt->bind_param("ssssssssssssssss", 
    // $new_patient_id, 
    $formatted_patient_id, 
    $sanitizedInputs['Title'], 
    $sanitizedInputs['FirstName'], 
    $sanitizedInputs['MiddleName'], 
    $sanitizedInputs['LastName'], 
    $sanitizedInputs['DateOfBirth'], 
    $age, 
    $sanitizedInputs['Gender'], 
    $sanitizedInputs['CivilStatus'], 
    $sanitizedInputs['Trimester'], 
    $sanitizedInputs['Address'], 
    $sanitizedInputs['Phone'], 
    $sanitizedInputs['Email'], 
    $sanitizedInputs['ObstetricHistory'], 
    $sanitizedInputs['DateCheckIn'], 
    $sanitizedInputs['DoctorAssigned']
);

if ($stmt->execute()) {
    $patientId = $stmt->insert_id; // Get the auto-generated patient ID
    $hasMedicalHistory = $_POST['MedicalHistory'] ?? 'no';

    // Get the selected doctor's full name from the form
    $selectedDoctorFullName = $_POST['DoctorAssigned'] ?? '';

    // Retrieve the doctor's ID based on the selected full name
    $sql_doctor_id = "SELECT DoctorID FROM doctors WHERE CONCAT(Title, ' ', FirstName, ' ', LastName) = ?";
    $stmt_doctor_id = $conn->prepare($sql_doctor_id);
    $stmt_doctor_id->bind_param("s", $selectedDoctorFullName);
    $stmt_doctor_id->execute();
    $result_doctor_id = $stmt_doctor_id->get_result();

    if ($result_doctor_id->num_rows > 0) {
        $row_doctor_id = $result_doctor_id->fetch_assoc();
        $doctorId = $row_doctor_id['DoctorID'];

        // Insert into pdrel table
        $sql_pdrel = "INSERT INTO pdrel (PatientID, DoctorID) VALUES (?, ?)";
        $stmt_pdrel = $conn->prepare($sql_pdrel);
        $stmt_pdrel->bind_param("ii", $patientId, $doctorId);
        if ($stmt_pdrel->execute()) {
            $stmt_pdrel->close();
            // If insertion into pdrel table is successful
            // Check if patient has medical history
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
                    $stmt_medical->close();
                    // Redirect to patient list page after successful insertion
                    header('Location: patient_list.php');
                    exit();
                } else {
                    // Handle error when inserting medical history
                    $error_message = "Error: " . $stmt_medical->error;
                }
            } else {
                // If patient has no medical history, redirect to patient list page
                header('Location: patient_list.php');
                exit();
            }
        } else {
            // Handle error when inserting into pdrel table
            $error_message = "Error: " . $stmt_pdrel->error;
        }
    } else {
        // Handle error when doctor ID not found
        $error_message = "Error: Doctor ID not found.";
    }
    $stmt_doctor_id->close();
} else {
    // Handle error when inserting into patients table
    $error_message = "Error: " . $stmt->error;
}

// Display error message if any
if (isset($error_message)) {
    echo json_encode(array("status" => "error", "message" => $error_message));
} else {
    // Success message when both insertions are successful (this will not be reached if any error occurs)
    echo json_encode(array("status" => "success", "message" => "Patient added successfully"));
}

// Close prepared statement
$stmt->close();


?>
