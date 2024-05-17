<?php
// Replace these variables with your MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "123";
$database = "railway_reservation";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket_id = $_POST["ticket_id"];
    $user_id = $_POST["user_id"];
    $ticket_type = $_POST["ticket_type"];
    $ticket_date = $_POST["ticket_date"];

    // Prepare and execute an SQL INSERT statement
    $sql = "INSERT INTO ticket(ticket_id, user_id, ticket_type, ticket_date)
            VALUES ('$ticket_id', '$user_id', '$ticket_type', '$ticket_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation ticket created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
