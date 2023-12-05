<?php
include 'db_config.php';

// SQL query to fetch all enrollment details
$sql = "SELECT * FROM Enrollment";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment List</title>
    <link rel="stylesheet" href="enrollment_css/enrollment.css">
</head>
<body>
<h2>Enrollment List</h2>
<a href="index_student.php">Student</a><br>
    <a href="index_course.php">Course</a><br>
    <a href="index_student.php">instructors</a>
<?php
if ($result->num_rows > 0) {
 
    echo "<table border='1'>
            <tr>
                <th>Enrollment ID</th>
                <th>Student ID</th>
                <th>Course ID</th>
                <th>Enrollment Date</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['EnrollmentID']}</td>
                <td>{$row['StudentID']}</td>
                <td>{$row['CourseID']}</td>
                <td>{$row['EnrollmentDate']}</td>
                <td>{$row['Grade']}</td>
                <td><a href='edit_enrollment.php?id={$row['EnrollmentID']}'>Edit</a> | <a href='delete_enrollment.php?id={$row['EnrollmentID']}'>Delete</a></td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No enrollments found.";
}

// Close the database connection
$conn->close();
?>
    <a href="create_enrollment.php">Add Enrollment</a><br>
    <a href="index_student.php">Go back to student</a>
</body>
</html>
