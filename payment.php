
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
    $pay_id = $_POST["pay_id"];
    $user_id = $_POST["user_id"];
    
    $pay_amount = $_POST["pay_amount"];
    $pay_date = $_POST["pay_date"];

    // Prepare and execute an SQL INSERT statement
    $sql = "INSERT INTO payment(pay_id, user_id, pay_amount, pay_date)
            VALUES ('$pay_id', '$user_id', '$pay_amount', '$pay_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment Done successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if pay_id already exists
$check_sql = "SELECT pay_id FROM payment WHERE pay_id = '$pay_id'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    // Handle the case where pay_id already exists (e.g., generate a new pay_id)
} else {
    // Insert the new payment record
    // ...
}


// Close the database connection
$conn->close();








?>
