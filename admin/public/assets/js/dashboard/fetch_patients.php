<?php
include '../connection/conn.php';

// SQL query to fetch patient data
$sql = "SELECT DateCheckIn, NewPatient FROM patients";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $patientsData = array();

    // Fetch data from each row
    while($row = $result->fetch_assoc()) {
        $patientsData[] = $row;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($patientsData);
} else {
    echo "0 results";
}

$conn->close();

?>
