<?php
// Replace these variables with your MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "123";
$database_name = "railway_reservation";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database_name,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $train_id = $_POST["train_id"];
    $train_name = $_POST["train_name"];
    $train_number = $_POST["train_number"];
    $train_type = $_POST["train_type"];

    // Prepare and execute an SQL INSERT statement
    $sql = "INSERT INTO trains(train_id, train_name, train_number, train_type)
            VALUES ('$train_id', '$train_name', '$train_number', '$train_type')";

    if ($conn->query($sql) === TRUE) {
        echo "Train record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
