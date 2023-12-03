<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for enrollment information
    $enrollmentID = $_POST['enrollmentID'];
    $enrollmentDate = $_POST['enrollmentDate'];
    $grade = $_POST['grade'];

    // Fetch StudentID and CourseID based on user input
    $studentID = $_POST['studentID']; // Assuming studentID is input by the user
    $courseID = $_POST['courseID']; // Assuming courseID is input by the user

    // SQL query to insert data into the Enrollment table
    $sql = "INSERT INTO Enrollment (EnrollmentID, StudentID, CourseID, EnrollmentDate, Grade) 
            VALUES ('$enrollmentID', '$studentID', '$courseID', '$enrollmentDate', '$grade')";

    if ($conn->query($sql) === TRUE) {
        echo "Enrollment information saved successfully!";
        header("Location: index_enrollment.php");
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
    <title>Create Enrollment</title>
</head>
<body>
    <h2>Create Enrollment</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

        <!-- You can replace these input fields with dropdowns populated from the related tables -->
        <label for="studentID">Student ID:</label>
        <input type="number" name="studentID" required><br>

        <label for="courseID">Course ID:</label>
        <input type="number" name="courseID" required><br>

        <label for="enrollmentDate">Enrollment Date:</label>
        <input type="date" name="enrollmentDate" required><br>

        <label for="grade">Grade:</label>
        <input type="text" name="grade"><br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
