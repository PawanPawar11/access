<?php
// update.php - Updates existing records in the database

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $conn->real_escape_string($_POST['roll']);
    $name = $conn->real_escape_string($_POST['name']);
    $dept = $conn->real_escape_string($_POST['dept']);

    $sql = "UPDATE record SET name='$name', dept='$dept' WHERE roll='$roll'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to view.php after successful update
        header("Location: view.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

