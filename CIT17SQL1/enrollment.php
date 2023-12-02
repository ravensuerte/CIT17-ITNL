<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for new enrollment
    $enrollmentID = $_POST['enrollmentID'];

    
    $enrollmentDate = $_POST['enrollmentDate'];
    $grade = $_POST['grade'];

    // SQL query to insert data into the Enrollment table
    $sql = "INSERT INTO Enrollment (EnrollmentID,  EnrollmentDate, Grade) 
            VALUES ('$enrollmentID', '$enrollmentDate', '$grade')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_enrollemnt.php");
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
    <title>Add New Enrollment</title>
</head>
<body>
    <h2>Add New Enrollment</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    
        <label for="enrollmentID">Enrollment ID:</label>
        <input type="number" name="enrollmentID" required><br>


        <label for="enrollmentDate">Enrollment Date:</label>
        <input type="date" name="enrollmentDate" required><br>

        <label for="grade">Grade:</label>
        <input type="text" name="grade"><br>

        <input type="submit" value="Add Enrollment">
    </form>

    <br>
    <a href="index_enrollemnt.php">Back to Enrollment List</a>
</body>
</html>
