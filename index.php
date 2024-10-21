<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent a Vehicle Today!</title>
    <link rel="icon" type="image/png" href="./images/favicon.png">

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            background-image: url('./images/BGimage.png');
            background-size: contain; 
            background-position: center;
            background-repeat: no-repeat; 
      
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
            height: 40px; 
            width: auto;
            margin: 0; 
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

        
        .main-content {
            flex: 1; 
            text-align: justify;
            color:white;
            padding: 55px;
            background-image: url('./images/BGimage.png');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .main-content h1 {
            width:100vh;
    
            text-align: center;
            box-shadow: 10px 4px 8px rgba(0, 0, 0, 0.6); 
            text-shadow: 10px 4px 8px rgba(0, 0, 0, 0.2); 
            font-size: 2.5rem;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 20px;
            padding:10px;
            float: right;
           
        }

        .main-content p {
            color:white;
            font-size: 1.2rem;
            text-align: center;
            float: right;
        }

       
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


    <div id="navbar">
        
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="session-check.php">Book now</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="Adminlogin.html">Admin</a></li>
        </ul>
        <div class="account-icon">
            <img src="./images/account-logo.png" alt="Account" />
            <a href="OEP_registration_page.html" target="_self">Register</a>
            <a href="Login.php" target="_self">Sign-In</a>
        </div>
    </div>
    

    <div class="main-content">
        <h1>Welcome to Our Vehicle Rental Service</h1>
        <p>Find the perfect vehicle for your next trip. Browse our selection of cars, SUVs, and more!</p>
    </div>

 
    <footer id="footer">
        <div class="about-us">
            <h2>About Us</h2>
            <p>We are a leading vehicle rental company offering a wide range of cars, SUVs, and more. Our mission is to provide the best rental experience with competitive prices and top-notch customer service.</p>
            <p>Whether you're looking for a short-term rental or a long-term vehicle solution, we have you covered. Thank you for choosing us!</p>
        </div>
    </footer>

</body>
</html>
