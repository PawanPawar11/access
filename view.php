<?php
// view.php - Displays records from the database with options to update or delete

// Include the database connection file
include 'db.php';

// SQL query to select all records from the 'record' table
$sql = "SELECT roll, name, dept FROM record";
$result = $conn->query($sql);

// Check if there are any records to display
if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "Roll: " . $row["roll"]. " - Name: " . $row["name"]. " - Dept: " . $row["dept"];
        
        // Add update and delete options
        echo " <a href='update_form.php?roll=" . $row["roll"] . "'>Update</a>";
        echo " | ";
        echo "<form action='delete.php' method='post' style='display:inline;'>
                <input type='hidden' name='roll' value='" . $row["roll"] . "'>
                <input type='submit' value='Delete'>
              </form>";
        echo "<br>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>

