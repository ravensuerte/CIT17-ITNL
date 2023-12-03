<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $courseID = $_GET['id'];

    // SQL query to fetch course details by ID
    $sql = "SELECT * FROM Course WHERE CourseID = '$courseID'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $courseName = $row['CourseName'];
        $credits = $row['Credits'];
    } else {
        echo "Course not found";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for updated course
    $courseID = $_POST['courseID'];
    $courseName = $_POST['courseName'];
    $credits = $_POST['credits'];

    // SQL query to update course data
    $sql = "UPDATE Course 
            SET CourseID = '$courseID', CourseName = '$courseName', Credits = '$credits' 
            WHERE CourseID = '$courseID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_course.php");
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
    <title>Edit Course</title>
</head>
<body>
    <h2>Edit Course</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="courseID">Course ID:</label>
        <input type="text" name="courseID" value="<?php echo $courseID; ?>" readonly><br>

        <label for="courseName">Course Name:</label>
        <input type="text" name="courseName" value="<?php echo $courseName; ?>" required><br>

        <label for="credits">Credits:</label>
        <input type="number" name="credits" value="<?php echo $credits; ?>" required><br>

        <input type="submit" value="Update Course">
    </form>

    <br>
    <a href="index_course.php">Back to Course List</a>
</body>
</html>
