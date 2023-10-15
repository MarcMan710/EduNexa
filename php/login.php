<?php
// Simulating database connection
$servername = "localhost";
$username = "marcman";
$password = "12345678"; 
$dbname = "db_edunexa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the form sends the data via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; // In a production environment, use appropriate encryption here

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Redirect to the dashboard upon successful login
        header("Location: dashboard.html");
        exit();
    } else {
        // Handle unsuccessful login, e.g., display an error message
        echo "Invalid username or password. Please try again.";
    }
}

$conn->close();
?>
