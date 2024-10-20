<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-image: url('./images/card.jpg');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #f3873b;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            background-image: url('./images/card.jpg');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
        }

        .sidebar h2 {
            text-align: center;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            margin: 10px 0;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #d67e2a;
        }

        /* Main content area */
        .main {
            flex-grow: 1;
            padding: 20px;
            background-color: white;
            overflow-y: auto;
            background-image: url('./images/card.jpg');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Logout button */
        .logout {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .logout:hover {
            background-color: #ff1a1a;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="index.php">Home</a> <!-- Full redirect to index.php -->
        <a href="d.php?page=booked">Booked</a>
        <a href="table.php?page=users">Users</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <div class="main">
        <?php
        // Default page to show booked data first
        $page = isset($_GET['page']) ? $_GET['page'] : 'booked';

        // Include content based on the selected page
        switch ($page) {
            case 'users':
                include 'table.php'; // Users page
                break;
            case 'booked':
                include 'd.php'; // Booked cars page
                break;
            default:
                include 'd.php'; // Load booked data as default
                break;
        }
        ?>
    </div>

</body>
</html>
