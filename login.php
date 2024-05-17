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
    $login_id = $_POST["login_id"];
    $user_id = $_POST["user_id"];
    $role_id = $_POST["role_id"];
    $login_username = $_POST["login_username"];
    $login_password = $_POST["login_password"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO login (login_id, user_id, role_id, login_username, login_password) VALUES ('$login_id', '$user_id', '$role_id', '$login_username', '$login_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Login Successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

