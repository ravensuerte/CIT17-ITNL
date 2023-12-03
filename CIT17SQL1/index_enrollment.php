<?php
include 'db_config.php';

// SQL query to fetch all enrollment details
$sql = "SELECT * FROM Enrollment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Enrollment List</h2>";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment List</title>
</head>
<body>
    <a href="create_enrollment.php">Add Enrollment</a>
    <a href="index.php">Go back to student</a>
</body>
</html>
