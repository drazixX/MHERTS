<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to your database
    include '../connection/conn.php';

    // Get last patient ID from the database
    $sql_last_patient_id = "SELECT MAX(FamilyRec_Id) AS LastFamilyRec_Id FROM patients_mother";
    $result_last_patient_id = $conn->query($sql_last_patient_id);
    $last_patient_id_row = $result_last_patient_id->fetch_assoc();
    $last_patient_id = $last_patient_id_row['LastFamilyRec_Id'];

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

    // Prepare SQL statement for inserting into patients_mother table
    $stmtMother = $conn->prepare("INSERT INTO patients_mother (FormattedFR_ID, Title, First_Name, Middle_Name, Last_Name, DateOfBirth, Age, Gender, Civil_Status, Address, Phone, Educ_Level, Occupation, Religion, Date_CheckIn, Doc_Assigned) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if prepare() succeeded
    if (!$stmtMother) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters for patients_mother table
    $stmtMother->bind_param("sssssissssssssss", $formatted_patient_id, $title, $firstName, $middleName, $lastName, $dateOfBirth, $age, $gender, $civilStatus, $address, $phone, $educLevel, $occupation, $religion, $dateCheckIn, $doctorAssigned);

    // Set parameters from POST data for patients_mother table
    // $formatted_patient_id,
    $title = $_POST['Title'] ?? '';
    $firstName = $_POST['FirstName'] ?? '';
    $middleName = $_POST['MiddleName'] ?? '';
    $lastName = $_POST['LastName'] ?? '';
    $dateOfBirth = $_POST['DateOfBirth'] ?? '';

    // Calculate age based on Date of Birth
    $today = new DateTime();
    $birthDate = new DateTime($dateOfBirth);
    $age = $today->diff($birthDate)->y;

    $gender = $_POST['Gender'] ?? '';
    $civilStatus = $_POST['CivilStatus'] ?? '';
    $address = $_POST['Address'] ?? '';
    $phone = $_POST['Phone'] ?? '';
    $educLevel = $_POST['Educlevel'] ?? '';
    $occupation = $_POST['Occupation'] ?? '';
    $religion = $_POST['Religion'] ?? '';
    $dateCheckIn = $_POST['DateCheckIn'] ?? '';
    $doctorAssigned = $_POST['DoctorAssigned'] ?? '';
    $status = $_POST['Status'] ?? '';


    // Execute the SQL statement for patients_mother table
    if ($stmtMother->execute()) {
        $familyRecId = $conn->insert_id; // Get the FamilyRec_Id of the inserted record

        // Prepare SQL statement for inserting into patient_status table
        $stmtStatus = $conn->prepare("INSERT INTO patient_status (FamilyRec_Id, status) VALUES (?, ?)");

        // Check if prepare() succeeded
        if (!$stmtStatus) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters for patient_status table
        $stmtStatus->bind_param("is", $familyRecId, $status);

        // Execute the SQL statement for patient_status table
        if (!$stmtStatus->execute()) {
            die("Error executing statement: " . $stmtStatus->error);
        }

        $stmtStatus->close(); // Close patient_status statement

        // Prepare SQL statement for inserting into spouseInfo table
        $stmtSpouse = $conn->prepare("INSERT INTO spouseinformation (FamilyRec_Id, Name, Age, BloodType, Src_Income) VALUES (?, ?, ?, ?, ?)");

        // Check if prepare() succeeded
        if (!$stmtSpouse) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind parameters for spouseInfo table
        $stmtSpouse->bind_param("isiss", $familyRecId, $spouse, $spouseAge, $bloodType, $srcIncome);

        // Set parameters from POST data for spouseInfo table
        $spouse = $_POST['Spouse'] ?? '';
        $spouseAge = $_POST['Age'] ?? '';
        $bloodType = $_POST['BloodType2'] ?? '';
        $srcIncome = $_POST['SrcIncome'] ?? '';

        // Execute the SQL statement for spouseInfo table
        if ($stmtSpouse->execute()) {
            $stmtSpouse->close(); // Close spouse statement

            // Prepare SQL statement for inserting into obs_history table
            $stmtObsHistory = $conn->prepare("INSERT INTO obs_history (FamilyRec_Id, G, P, F, PregNo, LMP, EDC, EDD, BloodType, PhilHNo, BP, PR, RR, FH, FHT, AOG) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Check if prepare() succeeded
            if (!$stmtObsHistory) {
                die("Error preparing statement: " . $conn->error);
            }

            // Bind parameters for obs_history table
            $stmtObsHistory->bind_param("iiiiisssssssssss", $familyRecId, $g, $p, $f, $pregNo, $lmp, $edc, $edd, $bloodType, $philHNo, $bp, $pr, $rr, $fh, $fht, $aog);

            // Set parameters from POST data for obs_history table
            $g = isset($_POST['flexRadioDefault4']) ? 1 : 0;
            $p = isset($_POST['flexRadioDefault5']) ? 1 : 0;
            $f = isset($_POST['flexRadioDefault6']) ? 1 : 0;
            $pregNo = $_POST['PregNo'] ?? '';
            $lmp = $_POST['lmp'] ?? '';
            $edc = $_POST['edc'] ?? '';
            $edd = $_POST['edd'] ?? '';
            $bloodType = $_POST['BloodType1'] ?? '';
            $philHNo = $_POST['PhilHNo'] ?? '';
            $bp = $_POST['BP'] ?? '';
            $pr = $_POST['PR'] ?? '';
            $rr = $_POST['RR'] ?? '';
            $fh = $_POST['FH'] ?? '';
            $fht = $_POST['FHT'] ?? '';
            $aog = $_POST['AOG'] ?? '';

            // Execute the SQL statement for obs_history table
            if ($stmtObsHistory->execute()) {
                $stmtObsHistory->close(); // Close obs_history statement

                // Check if the user has medical history
                if ($_POST['MedicalHistory'] === 'yes') {
                    // Prepare SQL statement for inserting into medicalhistory table
                    $stmtMedicalHistory = $conn->prepare("INSERT INTO medicalhistory (FamilyRec_Id, Conditions, DiagnosisDate, Treatment, Medications, Surgeries) VALUES (?, ?, ?, ?, ?, ?)");

                    // Check if prepare() succeeded
                    if (!$stmtMedicalHistory) {
                        die("Error preparing statement: " . $conn->error);
                    }

                    // Bind parameters for medicalhistory table
                    $stmtMedicalHistory->bind_param("isssss", $familyRecId, $condition, $diagnosisDate, $treatment, $medications, $surgeries);

                    // Set parameters from POST data for medicalhistory table
                    $condition = $_POST['conditions'] ?? '';
                    $diagnosisDate = $_POST['diagnosisDate'] ?? '';
                    $treatment = $_POST['treatment'] ?? '';
                    $medications = $_POST['medications'] ?? '';
                    $surgeries = $_POST['surgeries'] ?? '';

                    // Execute the SQL statement for medicalhistory table
                    if ($stmtMedicalHistory->execute()) {
                        $stmtMedicalHistory->close(); // Close medicalhistory statement
                    } else {
                        echo "Error executing statement: " . $stmtMedicalHistory->error;
                    }
                }

                // Get the selected doctor's full name from the form
                $selectedDoctorFullName = $_POST['DoctorAssigned'] ?? '';

                // Retrieve the doctor's ID based on the selected full name
                $sql_doctor_id = "SELECT DoctorID FROM doctors WHERE CONCAT(Title, ' ', FirstName, ' ', LastName) = ?";
                $stmt_doctor_id = $conn->prepare($sql_doctor_id);

                // Check if prepare() succeeded
                if (!$stmt_doctor_id) {
                    die("Error preparing statement: " . $conn->error);
                }

                $stmt_doctor_id->bind_param("s", $selectedDoctorFullName);
                $stmt_doctor_id->execute();
                $result_doctor_id = $stmt_doctor_id->get_result();

                if ($result_doctor_id->num_rows > 0) {
                    $row_doctor_id = $result_doctor_id->fetch_assoc();
                    $doctorId = $row_doctor_id['DoctorID'];

                    // Prepare SQL statement for inserting into pdrels table
                    $stmtPdrel = $conn->prepare("INSERT INTO pdrels (FamilyRec_Id, DoctorID) VALUES (?, ?)");

                    // Check if prepare() succeeded
                    if (!$stmtPdrel) {
                        die("Error preparing statement: " . $conn->error);
                    }

                    // Bind parameters for pdrels table
                    $stmtPdrel->bind_param("ii", $familyRecId, $doctorId);

                    // Execute the SQL statement for pdrel table
                    if ($stmtPdrel->execute()) {
                        $stmtPdrel->close(); // Close pdrel statement
                        echo "<script>alert('Patients added successfully');</script>";
                        header('Location: ../patient_list.php');
                    } else {
                        echo "Error executing statement: " . $stmtPdrel->error;
                    }
                } else {
                    echo "No doctor found with the selected full name.";
                }

                $stmt_doctor_id->close();
            } else {
                echo "Error executing statement: " . $stmtObsHistory->error;
            }
        } else {
            echo "Error executing statement: " . $stmtSpouse->error;
        }
    } else {
        echo "Error executing statement: " . $stmtMother->error;
    }

    // Close database connection
    $conn->close();
}
?>
