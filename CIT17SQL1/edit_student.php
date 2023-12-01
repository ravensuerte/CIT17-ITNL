<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $studentID = $_GET['id'];

    // SQL query to fetch student details by ID
    $sql = "SELECT * FROM Student WHERE StudentID = '$studentID'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
        $dateOfBirth = $row['DateOfBirth'];
        $email = $row['Email'];
        $phone = $row['Phone'];
    } else {
        echo "Student not found";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for updated student
    $studentID = $_POST['studentID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL query to update student data
    $sql = "UPDATE Student 
            SET FirstName = '$firstName', LastName = '$lastName', DateOfBirth = '$dateOfBirth', 
                Email = '$email', Phone = '$phone' 
            WHERE StudentID = '$studentID'";

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
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="hidden" name="studentID" value="<?php echo $studentID; ?>">

        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo $firstName; ?>" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $lastName; ?>" required><br>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" name="dateOfBirth" value="<?php echo $dateOfBirth; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>"><br>

        <input type="submit" value="Update Student">
    </form>

    <br>
    <a href="index.php">Back to Student List</a>
</body>
</html>
