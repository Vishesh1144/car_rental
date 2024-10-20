<?php
session_start(); // Start the session at the beginning of the file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent a Vehicle Today!</title>
    
    <!-- Inline CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* CSS Variables */
        :root {
            --navbar-height: 59px;
        }

        /* Navigation Bar */
        #navbar {
            display: flex;
            align-items: center;
            position: sticky;
            top: 0px;
            background-color: #ef8a42;
            padding: 10px;
            z-index: 1;
        }

        /* Navigation Bar: Logo and Image */
        #logo {
            margin: 10px 34px;
        }

        #logo img {
            height: 40px; /* Set the height to a smaller size */
            width: auto; /* Maintain aspect ratio */
            margin: 0; /* Remove margin */
        }

        /* Navigation Bar: List Styling */
        .nav-links {
            display: flex;
            font-family: 'Baloo Bhai', cursive;
            list-style: none;
        }

        .nav-links li {
            font-size: 1.3rem;
            margin-right: 15px;
        }

        .nav-links li a {
            color: white;
            display: block;
            padding: 3px 22px;
            border-radius: 20px;
            text-decoration: none;
        }

        .nav-links li a:hover {
            color: black;
            background-color: white;
        }

        /* Account Icon */
        .account-icon {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .account-icon img {
            height: 40px;
            margin-right: 10px;
        }

        .account-icon a {
            color: white;
            margin-left: 10px;
            text-decoration: none;
        }

        .account-icon a:hover {
            color: black;
            text-decoration: underline;
        }

        /* Main Content Styling */
        .main-content {
            flex: 1; /* This makes the main content take the remaining space */
            text-align: center;
            padding: 50px;
            background-color: #f8f8f8;
            background-image: url('./images/BGimage.png');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            box-shadow:red;
        }

        .main-content h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color:white;
        }

        .main-content p {
            font-size: 1.2rem;
           
            color:white;
        }

        /* About Us Section */
        footer {
            background-color: black;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .about-us h2 {
            font-family: 'Bree Serif', serif;
            font-size: 2rem;
            margin-bottom: 2px;

        }

        .about-us p {
            font-family: 'Bree Serif', serif;
            font-size: .6rem;
            line-height: 1.5;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar (fixed at the top) -->
    <div id="navbar">
        
        <ul class="nav-links">
            <li><a href="">Home</a></li>
            <li><a href="Car_cards.php">Bookings</a></li>
            <li><a href="about.html">About Us</a></li>
        </ul>
        <div class="account-icon">
            <img src="./images/account-logo.png" alt="Account" />
            <a labelhref="#" target="_self">
                <?php
                // Display the user's name if they are logged in
                if (isset($_SESSION['user'])) {
                    echo htmlspecialchars($_SESSION['user']); // Use htmlspecialchars to prevent XSS
                } 
                ?>
            </a>
            <a href="Logout.php" target="_self">Log out</a>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
       <h1> <?php echo "Hello,".($_SESSION['user'])?><h1>
        <h1>Welcome to Our Vehicle Rental Service</h1>
        <p>Find the perfect vehicle for your next trip. Browse our selection of cars, SUVs, and more!</p>

    </div>

    <!-- About Us Section -->
    <footer id="footer">
        <div class="about-us">
            <h2>About Us</h2>
            <p>We are a leading vehicle rental company offering a wide range of cars, SUVs, and more. Our mission is to provide the best rental experience with competitive prices and top-notch customer service.</p>
            <p>Whether you're looking for a short-term rental or a long-term vehicle solution, we have you covered. Thank you for choosing us!</p>
        </div>
    </footer>

</body>
</html>
