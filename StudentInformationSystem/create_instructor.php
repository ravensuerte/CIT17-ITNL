<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for instructor information
    $instructorID = $_POST['instructorID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL query to insert data into the Instructor table
    $sql = "INSERT INTO Instructor (InstructorID, FirstName, LastName, Email, Phone) 
            VALUES ('$instructorID', '$firstName', '$lastName', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Instructor information saved successfully!";
        header("Location: index_instructor.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Instructor</title>
    <link rel="stylesheet" href="student_css/studentstyle.css">
</head>
<body>
    <h2>Create Instructor</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="instructorID">Instructor ID:</label>
        <input type="text" name="instructorID" required><br>

        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
