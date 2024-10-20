<?php
session_start();

// Store the car name in the session
if (isset($_POST['car_name'])) {
    $_SESSION['car_name'] = $_POST['car_name'];
}

// Redirect to the date-time booking page
header("Location: booking_form.php");
exit();
?>
