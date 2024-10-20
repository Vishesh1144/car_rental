<?php
// Database connection details
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'emp';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session
session_start();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $pass = $_POST['password'];  // Plain text password, no hashing

    // Direct SQL query without prepared statements (NOT SECURE)
    $sql = "SELECT * From usereg WHERE email = '$username' AND password = '$pass'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;  // Store username in session
        header("Location: welcome.php");    // Redirect to the welcome page
        exit();  // Important to stop further execution
    } else {
        echo "Invalid username or password.";
    }
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: OEP_sign_in.html");  // Redirect to the login page if not logged in
    exit();
    // echo "index";
}

// Welcome the user
echo "<h2>Welcome, " . $_SESSION['username'] . "!</h2>";
echo "<a href='index.php'>Logout</a>";

// Close the connection
$conn->close();
?>