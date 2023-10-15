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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = 1; // Get the user ID from the session
    $course_id = $_POST['course_id']; // Get the course ID from the form

    $enroll_at = date("Y-m-d H:i:s"); // Current timestamp

    $sql = "INSERT INTO user_courses (user_id, course_id, enrolled_at) VALUES ('$user_id', '$course_id', '$enroll_at')";

    if ($conn->query($sql) === TRUE) {
        echo "Enrollment successful. You can access the course now.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
