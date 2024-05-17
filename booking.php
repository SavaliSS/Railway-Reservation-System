<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "123";
$database = "railway_reservation";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST["booking_id"];
    $user_id = $_POST["user_id"];
    $booking_type = $_POST["booking_type"];
    $booking_date = $_POST["booking_date"];
    

    // Insert the form data into the database
    $sql = "INSERT INTO booking(booking_id, user_id, booking_type, booking_date) 
            VALUES ('$booking_id', '$user_id', '$booking_type', '$booking_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket Book Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
