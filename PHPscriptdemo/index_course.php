<?php
include 'db_config.php';

// SQL query to fetch all courses
$sql = "SELECT * FROM Course";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Courses</title>
    <link rel="stylesheet" href="course_css/course.css">
    
</head>
<body>
    <h2>Course List</h2>
    <a href="index_enrollment.php">Enrollment</a><br>
    <a href="index_student.php">Student</a><br>
    <a href="index_instructor.php">instructors</a>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Course ID</th><th>Course Name</th><th>Credits</th><th>Actions</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["CourseID"] . "</td>";
            echo "<td>" . $row["CourseName"] . "</td>";
            echo "<td>" . $row["Credits"] . "</td>";
            echo "<td><a href='edit_course.php?id={$row['CourseID']}'>Edit</a> | <a href='delete_course.php?id={$row['CourseID']}'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No courses found.";
    }

    // Close the database connection
    $conn->close();
    ?>
    <a href="create_course.php">add course</a>
    <a href="index_student.php">go back to students</a>
</body>
</html>
