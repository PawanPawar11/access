<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
</head>
<body>
    <!-- form.php - Provides a form for user input -->
    <form action="insert.php" method="post">
        <!-- Input fields for roll number, name, and department -->
        Roll: <input type="text" name="roll" required><br>
        Name: <input type="text" name="name" required><br>
        Dept: <input type="text" name="dept" required><br>
        <!-- Submit button to send form data to insert.php -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>

