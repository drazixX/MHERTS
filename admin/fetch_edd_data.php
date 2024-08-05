<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mherts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT MONTH(EDD) as month, COUNT(*) as count FROM obs_history GROUP BY month";
$result = $conn->query($sql);

$eddData = array_fill(1, 12, 0);
while($row = $result->fetch_assoc()) {
    $eddData[$row['month']] = $row['count'];
}

$conn->close();

echo json_encode(array_values($eddData));
?>
