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

// Query to fetch data from the `usereg` table
$sql = "SELECT firstname, lastname, email, address, pincode, city, state, contact FROM usereg";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Table</title>
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
            color: blue;
            text-align: center;
       
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            table, th, td {
                display: block;
                width: 100%;
            }

            th, td {
                box-sizing: border-box;
            }

            th {
                background-color: #34495e;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                padding-right: 10px;
                font-weight: bold;
                text-transform: uppercase;
                color: #34495e;
            }

            tr:hover {
                background-color: #fff;
            }
        }
    </style>
</head>
<body>

    <h1>User Data Table</h1>

    <!-- Display the table only if there's data -->
    <?php
    if ($result && $result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Pincode</th>
                    <th>City</th>
                    <th>State</th>
                </tr>";
        // Output data for each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["firstname"]) . "</td>
                    <td>" . htmlspecialchars($row["lastname"]) . "</td>
                    <td>" . htmlspecialchars($row["email"]) . "</td>
                    <td>" . htmlspecialchars($row["contact"]) . "</td>
                    <td>" . htmlspecialchars($row["address"]) . "</td>
                    <td>" . htmlspecialchars($row["pincode"]) . "</td>
                    <td>" . htmlspecialchars($row["city"]) . "</td>
                    <td>" . htmlspecialchars($row["state"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>No results found.</p>";
    }

    // Close connection
    $conn->close();
    ?>

</body>
</html>
