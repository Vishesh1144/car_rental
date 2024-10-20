<?php
session_start(); // Start the session

// Clear all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.php"); // Change 'login.php' to your desired page
exit();
?>
