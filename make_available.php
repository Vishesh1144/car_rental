<?php
// Database connection settings
$servername = "localhost"; // Update if necessary
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "emp"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if booking_id is set
if (isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];

    // Update the booking status to 'available'
    $sql = "UPDATE bookings SET status='available' WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        echo "Car made available successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No booking ID provided.";
}

// Close the connection
$conn->close();

// Redirect back to the booking display page
header("Location: admin.php"); // Update with the actual URL of your display page
exit;
?>
