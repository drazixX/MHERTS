<?php
include_once "connection/conn.php";

$title = $_POST['Title'];
$firstName = $_POST['FirstName'];
$middleName = $_POST['MiddleName'];
$lastName = $_POST['LastName'];
$dateOfBirth = $_POST['DateOfBirth'];
$gender = $_POST['Gender'];
$address = $_POST['Address'];
$mobile = $_POST['Mobile'];
$email = $_POST['Email'];
$specialization = $_POST['Specialize'];
$status = $_POST['Status'];
$joinDate = date("Y-m-d");

// Calculate age based on the date of birth
$birthDate = new DateTime($dateOfBirth);
$today = new DateTime();
$age = $today->diff($birthDate)->y;

// File upload handling
$targetDir = "./public/assets/images/uploads/"; // Specify the directory where you want to store the uploaded files
$targetFile = $targetDir . basename($_FILES["FormFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["FormFile"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["FormFile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["FormFile"]["tmp_name"], $targetFile)) {
        echo "The file ". basename( $_FILES["FormFile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$sql = "INSERT INTO doctors (Title, FirstName, MiddleName, LastName, DateOfBirth, Age, Gender, Address, Mobile, Email, Specialization, Status, JoinDate,File) VALUES ('$title', '$firstName', '$middleName', '$lastName', '$dateOfBirth', '$age', '$gender', '$address', '$mobile', '$email', '$specialization', '$status', '$joinDate', '$targetFile')";

if (mysqli_query($conn, $sql)) {
    header('Location: doctor_list.php');
    echo "Doctor's information added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
