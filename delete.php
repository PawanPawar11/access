<?php
// delete.php - Deletes records from the database

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll = $conn->real_escape_string($_POST['roll']);

    $sql = "DELETE FROM record WHERE roll='$roll'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to view.php after successful deletion
        header("Location: view.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

