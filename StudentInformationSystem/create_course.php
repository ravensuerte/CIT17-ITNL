<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for course information
    $courseID = $_POST['courseID'];
    $courseName = $_POST['courseName'];
    $credits = $_POST['credits'];

    // SQL query to insert data into the Course table
    $sql = "INSERT INTO Course (CourseID, CourseName, Credits) 
            VALUES ('$courseID', '$courseName', '$credits')";

    if ($conn->query($sql) === TRUE) {
        echo "Course information saved successfully!";
        header("Location: index_user.php");
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
    <title>Create Course</title>
    <link rel="stylesheet" href="student_css/studentstyle.css">
</head>
<body>
    <h2>Create Course</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="courseID">Course ID:</label>
        <input type="number" name="courseID" required><br>

        <label for="courseName">Course Name:</label>
        <input type="text" name="courseName" required><br>

        <label for="credits">Credits:</label>
        <input type="number" name="credits" required><br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
