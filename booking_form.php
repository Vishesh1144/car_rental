<?php
session_start();

// Check if the car name is set in the session
if (!isset($_SESSION['car_name'])) {
    header("Location: cars_list.php");  // Redirect to car list if no car is selected
    exit();
}

// Get the car name from the session
$car_name = $_SESSION['car_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Ride - <?php echo $car_name; ?></title>
    <link rel="stylesheet" href="bk.css">
</head>
<body>
    <h1>Book Your Ride - <?php echo $car_name; ?></h1>
    <!-- <form action="store_booking.php" method="POST">
        <label for="booking-date">Booking Date:</label>
        <input type="date" id="booking-date" name="booking-date" required>

        <label for="booking-time">Booking Time:</label>
        <input type="time" id="booking-time" name="booking-time" required>

        <label for="return-date">Return Date:</label>
        <input type="date" id="return-date" name="return-date" required>

        <label for="return-time">Return Time:</label>
        <input type="time" id="return-time" name="return-time" required>

        <button type="submit">Search</button>
    </form> -->




    <h1 class="h-primary center" style="font-size: 2.5rem; color: white; margin-top: 3%;">Book Your Ride Today!</h1>
        <div id="bookings">
        <form action="store_booking.php" method="POST">
    
                <div>
                    <label for="Booking">Booking date</label>
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                        <input type="date" id="booking-date" name="booking-date" required style="width: 65%;">
                        <input type="time" id="booking-time" name="booking-time" required style="width: 30%;">
                    </div>
                </div>
    
                <div style="margin-top: 15px;">
                    <label for="return-date">Return date</label>
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                        <input type="date" id="return-date" name="return-date" required style="width: 65%;">
                        <input type="time" id="return-time" name="return-time" required style="width: 30%;">
                    </div>
                </div>
    
                <button type="submit" style="margin-top: 20px; padding: 10px; width: 100%; background-color: #ef8a42; color: white; border-radius: 5px;">Book</button>
            </form>
        </div>
</body>
</html>
