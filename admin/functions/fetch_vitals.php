<?php
include '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $familyRecId = $_POST['FamilyRec_Id'];

    // Prepare and execute the SQL statement to fetch vitals data
    $stmt = $conn->prepare("SELECT BP, PR, RR, FH, FHT, AOG FROM vitals WHERE FamilyRec_Id = ?");
    $stmt->bind_param("i", $familyRecId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the data and return it as JSON
    if ($result->num_rows > 0) {
        $vitals = $result->fetch_assoc();
        echo json_encode($vitals);
    } else {
        echo json_encode([]);
    }

    $stmt->close();
    $conn->close();
}
?>
