<?php
// Include the database connection
include "connection/conn.php";

// Retrieve form data
$title = $_POST['Title'];
$firstName = $_POST['FirstName'];
$lastName = $_POST['LastName'];
$dateOfAppointment = $_POST['DateOfAppointment'];
$startTime = $_POST['StartTime'];
$endTime = $_POST['EndTime'];
$address = $_POST['Address'];
$mobile = $_POST['Mobile'];
$email = $_POST['Email'];
$consultDoc = $_POST['Consult_Doc'];
$conditions = $_POST['Conditions'];
$note = $_POST['Note'];

// Prepare SQL statement to insert data
$sql = "INSERT INTO appointments (Title, FirstName, LastName, DateOfAppointment, StartTime, EndTime, Address, Mobile, Email, Consult_Doc, Conditions, Note, Accepted)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssi", $title, $firstName, $lastName, $dateOfAppointment, $startTime, $endTime, $address, $mobile, $email, $consultDoc, $conditions, $note, $accepted);

// Set default value for Accepted
$accepted = 2; // or whatever default value you want

// Execute the statement
if ($stmt->execute()) {
    echo "<script>
            alert('Appointment successfully added!');
            window.location.href = 'appointment.php'; // Replace 'appointment.php' with the page you want to redirect to
          </script>";
} else {
    echo "<script>
            alert('Error: " . $stmt->error . "');
          </script>";
}

// Close database connection
$stmt->close();
$conn->close();
?>
