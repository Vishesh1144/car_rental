<?php
// Capture the form data from POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstname'])) {
    
    // Database connection
    $ser = "localhost";
    $usr = "root";
    $pass = "";
    $dbname = "emp";
    
    // Create connection
    $conn = mysqli_connect($ser, $usr, $pass, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Capture form inputs
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $city = $_POST['ct'];
    $state = $_POST['st'];
    $contact = $_POST['contact'];

    // Prepare the SQL query
    $sql = "INSERT INTO `usereg` (`firstname`, `lastname`, `password`, `address`, `pincode`, `city`, `state`, `email`, `contact`) 
            VALUES ('$firstname', '$lastname', '$password', '$address', '$pincode', '$city', '$state', '$email', '$contact')";
    
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Registration successful!');
        window.location.href = 'index.php'; // Redirect to the registration page
      </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>


