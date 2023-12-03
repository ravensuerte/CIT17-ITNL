<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $courseID = $_GET['id'];

    // SQL query to delete course by ID
    $sql = "DELETE FROM Course WHERE CourseID = '$courseID'";

    if ($conn->query($sql) === TRUE) {
        echo "Course deleted successfully!";
        header("Location: index_course.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
