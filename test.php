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
?>
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
        body {
            background-image: url('./images/BGimage.png');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat; 
        }
        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        :root {
            --navbar-height: 59px;
        }
        #navbar {
            display: flex;
            align-items: center;
            position: sticky;
            top: 0px;
            background-color: #ef8a42;
            padding: 10px;
            z-index: 1;
        }
        #logo {
            margin: 10px 34px;
        }
        #logo img {
            height: 40px;
            width: auto;
            margin: 0;
        }
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
        .form-container {
            background-color: white;
            margin-left: 35%;
            margin-top: 8%;
            margin-bottom: 4%;
            border-radius: 10px;
            padding-top: 20px;
            padding-left: 10px;
            padding-right: 30px;
            width: 400px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .signin-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
        }
        button {
            padding: 12px;
            margin-left: 150px;
            background-color: #f3873b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;margin-bottom: 20px
        }
        button:hover {
            background-color: #d97732;
        }
        a {
            color: #2ea7e0;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
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

    <div class="form-container signin-form">
        <h2>Sign In.</h2>
        <form action="Login.php" method="post">
            <input class="input-field" name="email" type="email" placeholder="Email" required>
            <div class="password-container">
                <input class="input-field" id="password" name="pass" type="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fas fa-eye" id="eye-icon"></i>
                </span>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="remember" required>
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit">Sign In</button>
            <div id="invalid">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST["email"];
                    $password = $_POST["pass"];

                    $sql = "SELECT * FROM usereg WHERE email = '$username' AND password = '$password'";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("SQL Error: " . $conn->error);
                    }

                    if ($result->num_rows > 0) {
                        session_start(); 
                        $name = $result->fetch_assoc();
                        $fn = $name['firstname'];
                        $_SESSION['user'] = $fn;
                        header("Location: loginhome.php");
                        exit();
                    } else {
                        echo "Invalid username or password.";
                    }
                }

                $conn->close();
                ?>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>

    <footer>
        <div class="about-us">
            <h2>About Us</h2>
            <p>We are a leading vehicle rental company offering a wide range of cars, SUVs, and more. Our mission is to provide the best rental experience with competitive prices and top-notch customer service.</p>
            <p>Whether you're looking for a short-term rental or a long-term vehicle solution, we have you covered. Thank you for choosing us!</p>
        </div>
    </footer>

</body>
</html>
