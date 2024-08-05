<?php
include '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $userType = $_POST['user_type'];

    // Handle image upload
    $uploadDirectory = '../public/assets/images/uploads/';
    $profileImage = null;

    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $uploadFile = $uploadDirectory . basename($_FILES['img']['name']);
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
                $profileImage = basename($_FILES['img']['name']);
            } else {
                echo "Error uploading file.";
                exit();
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }
    } elseif (isset($_POST['profileimg']) && !empty($_POST['profileimg'])) {
        // Handle base64 image data
        $base64Image = $_POST['profileimg'];
        $imageData = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $base64Image));
        $fileName = uniqid() . '.png';
        $uploadFile = $uploadDirectory . $fileName;

        if (file_put_contents($uploadFile, $imageData)) {
            $profileImage = $fileName;
        } else {
            echo "Error saving image.";
            exit();
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO tbl_users (username, password, email, user_type, avatar) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }

    $stmt->bind_param('sssss', $username, $password, $email, $userType, $profileImage);

    if ($stmt->execute()) {
        header('Location: ../user.php');
        exit();
    } else {
        echo "Error creating user: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: ../user.php');
    exit();
}
?>
