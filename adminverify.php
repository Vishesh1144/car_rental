<?php
session_start();

// Define static admin credentials
$admin_username = "root";
$admin_password = "root"; // Consider hashing for security

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the input matches the static credentials
    if ($username === $admin_username && $password === $admin_password) {
        // Set session variable for logged-in admin
        $_SESSION['admin_logged_in'] = true;
        header("Location:Admin.php"); // Redirect to admin dashboard
        exit;
    } else {
        // Redirect back to login form with error
        header("Location: Adminlogin.html?error=1");
        exit;
    }
}
?>
