<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch booked cars
$sql = "SELECT id, car_name, username, booking_date, booking_time, return_date, status FROM bookings WHERE status = 'unavailable'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Cars</title>
    <style>
        /* General body styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #f2f2f2;
            color: #333;
        }

        /* Styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Table border and cell padding */
        table, th, td {
            border: none;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        /* Header styling */
        th {
            background-color: #f3873b;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Alternate row background for better readability */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Hover effect for rows */
        tr:hover {
            background-color: #f1f1f1;
        }

        h1 {
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Booked Cars</h1>

    <!-- Display the table only if there's data -->
    <?php
    if ($result && $result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Car Name</th>
                    <th>Username</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>";
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["car_name"]) . "</td>
                    <td>" . htmlspecialchars($row["username"]) . "</td>
                    <td>" . htmlspecialchars($row["booking_date"]) . "</td>
                    <td>" . htmlspecialchars($row["booking_time"]) . "</td>
                    <td>" . htmlspecialchars($row["return_date"]) . "</td>
                    <td>
                        <form action='make_available.php' method='POST'>
                            <input type='hidden' name='booking_id' value='" . htmlspecialchars($row["id"]) . "'>
                            <button type='submit'>Make Available</button>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>No booked cars found.</p>";
    }

    // Close connection
    $conn->close();
    ?>

</body>
</html>
