<?php 
// Database connection
$servername = "localhost"; // Change if your server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "emp"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booked cars
$bookedCars = [];
$sql = "SELECT car_name FROM bookings WHERE status = 'unavailable'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $bookedCars[] = $row['car_name'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Tariffs in Surat</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('./images/card.jpg');
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin: 10px;
            width: 250px;
            text-align: center;
        }

        h2 {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .image-container {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .price-table {
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
        }

        .price-table td, .price-table th {
            padding: 5px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .price-table th {
            background-color: #f2f2f2;
        }

        .book-now-button {
            display: block;
            width: 100%;
            padding: 8px 15px;
            background-color: #d7601bd8;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            margin-top: 15px;
        }

        .description {
            font-size: 0.85rem;
            color: #555;
            margin-top: 8px;
        }

        .disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
       <!-- First Row -->
<div class="card">
    <h2>Maruti Swift</h2>
    <div class="image-container">
        <img src="./Images/maruti-swift.jpg" alt="Maruti Swift">
    </div>
    <p class="description">Compact and efficient, perfect for city drives and easy parking.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹250</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹900</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹2000</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Maruti Swift">
        <button type="submit" class="book-now-button <?php echo in_array("Maruti Swift", $bookedCars) ? 'disabled' : ''; ?>" 
                <?php echo in_array("Maruti Swift", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Maruti Swift", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>

<div class="card">
    <h2>Hyundai i20</h2>
    <div class="image-container">
        <img src="./Images/hyundai-i20.jpg" alt="Hyundai i20">
    </div>
    <p class="description">A stylish hatchback offering comfort and reliability.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹300</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹1000</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹2200</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Hyundai i20">
        <button type="submit" class="book-now-button <?php echo in_array("Hyundai i20", $bookedCars) ? 'disabled' : ''; ?>" 
                <?php echo in_array("Hyundai i20", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Hyundai i20", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>

<div class="card">
    <h2>Toyota Innova</h2>
    <div class="image-container">
        <img src="./Images/toyota-innova.jpg" alt="Toyota Innova">
    </div>
    <p class="description">Spacious and comfortable, great for long family trips.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹500</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹1800</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹3500</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Toyota Innova">
        <button type="submit" class="book-now-button <?php echo in_array("Toyota Innova", $bookedCars) ? 'disabled' : ''; ?>" 
                <?php echo in_array("Toyota Innova", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Toyota Innova", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>

<!-- Second Row -->
<div class="card">
    <h2>Honda City</h2>
    <div class="image-container">
        <img src="./Images/honda-city.jpg" alt="Honda City">
    </div>
    <p class="description">Luxurious sedan offering a premium driving experience.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹400</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹1500</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹3000</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Honda City">
        <button type="submit" class="book-now-button <?php echo in_array("Honda City", $bookedCars) ? 'disabled' : ''; ?>" 
                <?php echo in_array("Honda City", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Honda City", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>

<div class="card">
    <h2>Ford EcoSport</h2>
    <div class="image-container">
        <img src="./Images/ford-ecosport.jpg" alt="Ford EcoSport">
    </div>
    <p class="description">Compact SUV with robust performance and great handling.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹350</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹1200</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹2500</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Ford EcoSport">
        <button type="submit" class="book-now-button <?php echo in_array("Ford EcoSport", $bookedCars) ? 'disabled' : ''; ?>" 
                <?php echo in_array("Ford EcoSport", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Ford EcoSport", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>

<div class="card">
    <h2>Mahindra Scorpio</h2>
    <div class="image-container">
        <img src="./Images/mahindra-scorpio.jpg" alt="Mahindra Scorpio">
    </div>
    <p class="description">Rugged SUV with powerful performance, ideal for adventures.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹450</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹1700</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹3200</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Mahindra Scorpio">
        <button type="submit" class="book-now-button <?php echo in_array("Mahindra Scorpio", $bookedCars) ? 'disabled' : ''; ?>" 
                <?php echo in_array("Mahindra Scorpio", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Mahindra Scorpio", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>


        <div class="card">
    <h2>Hyundai Creta</h2>
    <div class="image-container">
        <img src="./Images/hyudai-creta.jpg" alt="Hyundai Creta">
    </div>
    <p class="description">A premium SUV with top-notch comfort and safety features.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹500</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹1800</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹3500</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Hyundai Creta">
        <button type="submit" class="book-now-button <?php echo in_array("Hyundai Creta", $bookedCars) ? 'disabled' : ''; ?>" <?php echo in_array("Hyundai Creta", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Hyundai Creta", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>

<div class="card">
    <h2>Maruti Baleno</h2>
    <div class="image-container">
        <img src="./Images/maruti-baleno.jpg" alt="Maruti Baleno">
    </div>
    <p class="description">A popular hatchback known for its spacious interior and fuel efficiency.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹250</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹900</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹2000</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Maruti Baleno">
        <button type="submit" class="book-now-button <?php echo in_array("Maruti Baleno", $bookedCars) ? 'disabled' : ''; ?>" <?php echo in_array("Maruti Baleno", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Maruti Baleno", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>

<div class="card">
    <h2>Tata Nexon</h2>
    <div class="image-container">
        <img src="./Images/tata-nexon.jpg" alt="Tata Nexon">
    </div>
    <p class="description">An affordable compact SUV with a strong safety rating.</p>
    <table class="price-table">
        <tr>
            <th>Duration</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>1 Hour</td>
            <td>₹350</td>
        </tr>
        <tr>
            <td>6 Hours</td>
            <td>₹1300</td>
        </tr>
        <tr>
            <td>24 Hours</td>
            <td>₹2800</td>
        </tr>
    </table>
    <form action="set_session.php" method="POST">
        <input type="hidden" name="car_name" value="Tata Nexon">
        <button type="submit" class="book-now-button <?php echo in_array("Tata Nexon", $bookedCars) ? 'disabled' : ''; ?>" <?php echo in_array("Tata Nexon", $bookedCars) ? 'disabled' : ''; ?>>
            <?php echo in_array("Tata Nexon", $bookedCars) ? 'Booked' : 'Book Now'; ?>
        </button>
    </form>
</div>

    </div>
</body>
</html>
