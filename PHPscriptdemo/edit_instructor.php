<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $instructorID = $_GET['id'];

    // SQL query to fetch instructor details by ID
    $sql = "SELECT * FROM Instructor WHERE InstructorID = '$instructorID'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $firstName = $row['FirstName'];
        $lastName = $row['LastName'];
        $email = $row['Email'];
        $phone = $row['Phone'];
    } else {
        echo "Instructor not found";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for updated instructor
    $instructorID = $_POST['instructorID'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL query to update instructor data
    $sql = "UPDATE Instructor 
            SET FirstName = '$firstName', LastName = '$lastName', Email = '$email', Phone = '$phone' 
            WHERE InstructorID = '$instructorID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_instructor.php");
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
    <title>Edit Instructor</title>
</head>
<body>
    <h2>Edit Instructor</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="hidden" name="instructorID" value="<?php echo $instructorID; ?>">

        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo $firstName; ?>" required><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $lastName; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" required><br>

        <input type="submit" value="Update Instructor">
    </form>

    <br>
    <a href="index_instructor.php">Back to Instructor List</a>
</body>
</html>
