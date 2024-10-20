<?php
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if car_name and user are set in the session
if (!isset($_SESSION['car_name'])) {
    header("Location: cars_list.php");
    exit();
}

if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Adjust this to your login page
    exit();
}

// Get car name and user from the session
$car_name = $_SESSION['car_name'];
$user = $_SESSION['user'];

// Get form data
$booking_date = $_POST['booking-date'] ?? null;
$booking_time = $_POST['booking-time'] ?? null;
$return_date = $_POST['return-date'] ?? null;
$return_time = $_POST['return-time'] ?? null;

if (!$booking_date || !$booking_time || !$return_date || !$return_time) {
    echo "Form data is incomplete.";
    exit();
}

// Database connection details
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'emp';

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert booking data
$stmt = $conn->prepare("INSERT INTO bookings (username, car_name, booking_date, booking_time, return_date, return_time, status) VALUES (?, ?, ?, ?, ?, ?, 'unavailable')");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind the form data to the SQL query
$stmt->bind_param("ssssss", $user, $car_name, $booking_date, $booking_time, $return_date, $return_time);

// Execute the query
if ($stmt->execute()) {
    // Prepare a success message and redirect after a delay
    echo "<script>
            alert('Booking successful!');
            window.location.href = 'loginhome.php'; // Redirect to the login home page
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>
