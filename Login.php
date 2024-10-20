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
    <title>Sign-In Page</title>
    <link rel="stylesheet" href="OEP_css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .form-container {
            max-width: 400px; /* Set max width for the form */
            margin: 0 auto; /* Center the form container */
            padding: 20px; /* Add some padding */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for visual appeal */
            border-radius: 5px; /* Round corners */
        }

        .input-field {
            width: calc(100% - 20px); /* Set width to full minus padding */
            padding: 10px; /* Add padding */
            margin-bottom: 15px; /* Add margin between fields */
            border: 1px solid #ccc; /* Add border */
            border-radius: 4px; /* Round corners */
            box-sizing: border-box; /* Include padding and border in element's total width */
        }

        .toggle-password {
            cursor: pointer;
            margin-left: 5px;
            font-size: 1.2em; /* Make the icon larger */
        }

        .password-container {
            position: relative;
            display: flex;
            align-items: center; /* Center the elements vertically */
        }

        .password-container span {
            position: absolute;
            right: 10px; /* Position it to the right */
        }
    </style>
</head>
<body>
    <div class="form-container signin-form">
        <h2>Sign In.</h2>
        <form action="Login.php" method="post">
            <input class="input-field" name="email" type="email" placeholder="Email" required>
            <div class="password-container">
                <input class="input-field" id="password" name="pass" type="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fas fa-eye" id="eye-icon"></i> <!-- Eye icon -->
                </span>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="remember" required>
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit">Sign In</button>
            <div id="invalid">
                <?php
                // Start the session
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST["email"];
                    $password = $_POST["pass"];

                    $sql = "SELECT * FROM usereg WHERE email = '$username' AND password = '$password'";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("SQL Error: " . $conn->error); // Handle SQL error
                    }

                    if ($result->num_rows > 0) {
                        session_start(); 
                        $name =  $result->fetch_assoc();
                        $fn = $name['firstname'];
                        $_SESSION['user'] = $fn;  // Store username in session
                        header("Location: loginhome.php");    // Redirect to the welcome page
                        exit();  // Important to stop further execution
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
                passwordField.type = 'text'; // Show password
                eyeIcon.classList.remove('fa-eye'); // Remove open eye icon
                eyeIcon.classList.add('fa-eye-slash'); // Add closed eye icon
            } else {
                passwordField.type = 'password'; // Hide password
                eyeIcon.classList.remove('fa-eye-slash'); // Remove closed eye icon
                eyeIcon.classList.add('fa-eye'); // Add open eye icon
            }
        }
    </script>
</body>
</html>
