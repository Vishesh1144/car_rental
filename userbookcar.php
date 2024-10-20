<?php
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the logged-in user from the session
$user = $_SESSION['user'];

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

// Prepare the SQL statement to fetch booked cars for the logged-in user
$stmt = $conn->prepare("SELECT car_name, booking_date, booking_time, return_date, return_time FROM bookings WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            color: #f3873b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f3873b;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>My Bookings</h2>

<?php
if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Car Name</th><th>Booking Date</th><th>Booking Time</th><th>Return Date</th><th>Return Time</th></tr>';
    
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['car_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['booking_date']) . '</td>';
        echo '<td>' . htmlspecialchars($row['booking_time']) . '</td>';
        echo '<td>' . htmlspecialchars($row['return_date']) . '</td>';
        echo '<td>' . htmlspecialchars($row['return_time']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No bookings found.</p>';
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();
?>

</body>
</html>
