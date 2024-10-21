<?php
// Start the session at the beginning of the file
session_start();

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

// Logic for handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["pass"];

    $sql = "SELECT * FROM usereg WHERE email = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if (!$result) {
        die("SQL Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $name = $result->fetch_assoc();
        $fn = $name['firstname'];
        $_SESSION['user'] = $fn;
        header("Location: loginhome.php");
        exit(); // Ensure to exit after the header redirection
    } else {
        $error_message = "Invalid username or password.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent a Vehicle Today!</title>
    <link rel="icon" type="image/png" href="./images/favicon.png">
    <style>
        /* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-image: url('./images/BGimage.png');
    background-size: cover; 
    background-position: center;
    background-repeat: no-repeat; 
    font-family: Arial, sans-serif;
}

/* Navbar Styles */
#navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    background-color: rgba(255, 255, 255, 0.8);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.nav-links {
    list-style-type: none;
    display: flex;
    gap: 20px;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

.account-icon {
    display: flex;
    align-items: center;
}

.account-icon img {
    width: 30px;
    height: 30px;
    margin-right: 10px;
}

.account-icon a {
    text-decoration: none;
    color: #333;
    margin-left: 10px;
}

/* Form Container Styles */
.form-container {
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.input-field {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.password-container {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 10px;
    cursor: pointer;
}

.checkbox-group {
    display: flex;
    align-items: center;
}

.checkbox-group input {
    margin-right: 10px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

/* Error Message Styles */
#invalid {
    color: red;
    text-align: center;
    margin-top: 10px;
}

/* Footer Styles */
footer {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    text-align: center;
    position: relative;
    bottom: 0;
    width: 100%;
}

.about-us {
    max-width: 600px;
    margin: 0 auto;
}

.about-us h2 {
    margin-bottom: 10px;
}

.about-us p {
    margin: 5px 0;
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
                if (isset($error_message)) {
                    echo $error_message;
                }
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
