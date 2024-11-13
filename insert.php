<?php
// insert.php - Handles the insertion of new records into the database

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $conn->real_escape_string($_POST['roll']);
    $name = $conn->real_escape_string($_POST['name']);
    $dept = $conn->real_escape_string($_POST['dept']);

    $sql = "INSERT INTO record (roll, name, dept) VALUES ('$roll', '$name', '$dept')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to view.php after successful insertion
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

