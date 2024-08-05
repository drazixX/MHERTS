<?php
session_start();
include 'conn.php';

// Sanitize user inputs
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

if ($username != '' && $password != '') {
    // Prepare a statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows) {
        // Fetch data into $row
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['avatar'] = $row['avatar'];

            $_SESSION['message'] = 'You have successfully logged in to Automated Maternal Health Record Tracking System!';
            $_SESSION['success'] = 'success';

            header('location: admin/index.php');
            exit();
        } else {
            $_SESSION['message'] = 'Username or password is incorrect!';
            $_SESSION['success'] = 'danger';
            header('location: index.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'Username or password is incorrect!';
        $_SESSION['success'] = 'danger';
        header('location: index');
        exit();
    }

    $stmt->close();
} else {
    $_SESSION['message'] = 'Username or password is empty!';
    $_SESSION['success'] = 'danger';
    header('location: index.php');
    exit();
}

$conn->close();
?>
