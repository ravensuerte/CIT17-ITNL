<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $enrollmentID = $_GET['id'];

    // SQL query to fetch enrollment details by ID
    $sql = "SELECT * FROM Enrollment WHERE EnrollmentID = '$enrollmentID'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $enrollmentID = $row['EnrollmentID'];
        $courseID = $row['CourseID'];
        $enrollmentDate = $row['EnrollmentDate'];
        $grade = $row['Grade'];
    } else {
        echo "Enrollment not found";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for updated enrollment
    $enrollmentID = $_POST['enrollmentID'];
    $enrollmentDate = $_POST['enrollmentDate'];
    $grade = $_POST['grade'];

    // SQL query to update enrollment data
    $sql = "UPDATE Enrollment 
            SET EnrollmentDate = '$enrollmentDate', Grade = '$grade' 
            WHERE EnrollmentID = '$enrollmentID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_enrollment.php");
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
    <title>Edit Enrollment</title>
</head>
<body>
    <h2>Edit Enrollment</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <input type="hidden" name="enrollmentID" value="<?php echo $enrollmentID; ?>">


        <label for="enrollmentDate">Enrollment Date:</label>
        <input type="date" name="enrollmentDate" value="<?php echo $enrollmentDate; ?>" required><br>

        <label for="grade">Grade:</label>
        <input type="text" name="grade" value="<?php echo $grade; ?>" required><br>

        <input type="submit" value="Update Enrollment">
    </form>

    <br>
    <a href="index_enrollemnt.php">Back to Enrollment List</a>
</body>
</html>
