<?php
// Establish a database connection (update with your database credentials)
$servername = "localhost";
$username = "root";
$password = "123";
$database = "railway_reservation";

$conn = new mysqli($servername, $username, $password, $database,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $user_mobile = $_POST["user_mobile"];
    $user_address = $_POST["user_address"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (user_id, user_name, user_email, user_mobile, user_address) VALUES ('$user_id', '$user_name', '$user_email', '$user_mobile', '$user_address')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

