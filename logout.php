<?php
// Start the session
session_start();

// Unset all of the session variables
unset($_SESSION['username']);
unset($_SESSION['user_role']);

// Destroy the session
session_destroy();

// Ensure session is completely destroyed by reinitializing the session array
$_SESSION = array();

// Set new session variables (for logout message)
$_SESSION['message'] = "You have been logged out!";
$_SESSION['success'] = 'danger';

// Redirect to login page
header('Location: index.php');
exit; // Ensure no more code is executed after redirection
?>
