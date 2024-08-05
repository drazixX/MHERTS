<?php
include './connection/conn.php';

session_start();
$user = $_SESSION['username'];

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload
    $image = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileExtension, $allowedExtensions)) {
            // Define the full upload path
            $uploadPath = 'public/assets/images/uploads/';
            $filePath = $uploadPath . $fileName;

            // Make sure the directory exists
            if (!is_dir($uploadPath)) {
                if (!mkdir($uploadPath, 0777, true)) {
                    $response['status'] = 'error';
                    $response['message'] = 'Error creating directory.';
                    echo json_encode($response);
                    exit;
                }
            }

            // Move the file to the upload directory
            if (move_uploaded_file($fileTmpPath, $filePath)) {
                $image = $filePath;
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error moving the uploaded file.';
                echo json_encode($response);
                exit;
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid file extension.';
            echo json_encode($response);
            exit;
        }
    }

    // Collect other form data
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $joinDate = $_POST['joinDate'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $educ_attainment = $_POST['educ_attainment'];

    // Prepare and execute the insert query
    $query = "INSERT INTO clinic_staff (firstName, middleName, lastName, birthDate, joinDate, address, mobile, email, gender, educ_attainment, image) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('sssssssssss', $firstName, $middleName, $lastName, $birthDate, $joinDate, $address, $mobile, $email, $gender, $educ_attainment, $image);
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Staff added successfully.';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error preparing the query: ' . $conn->error;
    }

    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

echo json_encode($response);
?>
