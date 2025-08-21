<!-- confirm_booking.php -->
<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "petconnect");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$vet_name = $_POST['vet_name'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$notes = $_POST['notes'];

// Insert into database
$sql = "INSERT INTO vet_bookings (vet_name, customer_name, phone, appointment_date, appointment_time, notes)
        VALUES ('$vet_name', '$name', '$phone', '$date', '$time', '$notes')";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #e3f2fd, #fff3e0);
            text-align: center;
            padding: 50px;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 { color: #2a5bd7; }
        a {
            display: inline-block;
            margin-top: 20px;
            background: #2a5bd7;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }
        a:hover { background: #1e4ab8; }
    </style>
</head>
<body>
<div class="box">
<?php
if ($conn->query($sql) === TRUE) {
    echo "<h2>✅ Booking Confirmed!</h2>";
    echo "<p>We have scheduled your appointment with <strong>$vet_name</strong> on <strong>$date</strong> at <strong>$time</strong>.</p>";
} else {
    echo "<h2>❌ Booking Failed</h2><p>" . $conn->error . "</p>";
}
$conn->close();
?>
<a href="vet_finder.html">Back to Vet Finder</a>
</div>
</body>
</html>
