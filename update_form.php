<?php
// update_form.php - Displays a form to update an existing record

// Include the database connection file
include 'db.php';

// Check if the roll number is provided in the query string
if (isset($_GET['roll'])) {
    $roll = $conn->real_escape_string($_GET['roll']);

    // SQL query to select the record with the given roll number
    $sql = "SELECT roll, name, dept FROM record WHERE roll='$roll'";
    $result = $conn->query($sql);

    // Check if the record exists
    if ($result->num_rows > 0) {
        // Fetch the record data
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Update Student</title>
        </head>
        <body>
            <h1>Update Student</h1>
            <form action="update.php" method="post">
                <!-- Pre-fill the form with the current data -->
                Roll: <input type="text" name="roll" value="<?php echo $row['roll']; ?>" readonly><br>
                Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
                Dept: <input type="text" name="dept" value="<?php echo $row['dept']; ?>"><br>
                <input type="submit" value="Update Student">
            </form>
        </body>
        </html>

        <?php
    } else {
        echo "Record not found.";
    }
} else {
    echo "No roll number provided.";
}

// Close the database connection
$conn->close();
?>

