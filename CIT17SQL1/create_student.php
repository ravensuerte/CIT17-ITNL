<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for new student
    $studentID = $_POST['studentID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL query to insert data into the Student table
    $sql = "INSERT INTO Student (StudentID,FirstName, LastName, DateOfBirth, Email, Phone) 
            VALUES ('$studentID','$firstName', '$lastName', '$dateOfBirth', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
</head>
<body>
    <h2>Add New Student</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

        <label for="studentID">Student ID:</label>
        <input type="number" name="studentID" required><br>

        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" name="dateOfBirth" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone"><br>

        <input type="submit" value="Add Student">
    </form>

    <br>
    <a href="index.php">Back to Student List</a>
</body>
</html>
