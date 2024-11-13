<?php
// db.php - Establishes a connection to the MySQL database

// Database connection parameters
$server = 'localhost';
$username = 'student';
$password = '123';
$dbname = 'student';

// Create a new MySQLi connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    // If there is a connection error, terminate the script and display the error
    die("Connection failed: " . $conn->connect_error);
}
?>

