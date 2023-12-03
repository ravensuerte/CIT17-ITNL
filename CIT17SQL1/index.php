<?php
include 'db_config.php';

// SQL query to fetch all student records
$sql = "SELECT * FROM Student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Students</title>
</head>
<body>
    <h2>Student List</h2>

    <table border="1">
        <tr>
            <th>StudentID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['StudentID']}</td>";
            echo "<td>{$row['FirstName']}</td>";
            echo "<td>{$row['LastName']}</td>";
            echo "<td>{$row['DateOfBirth']}</td>";
            echo "<td>{$row['Email']}</td>";
            echo "<td>{$row['Phone']}</td>";
            echo "<td><a href='edit_student.php?id={$row['StudentID']}'>Edit</a> | <a href='delete_student.php?id={$row['StudentID']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="create_student.php">Add student</a><br>
    <a href="index_enrollment.php">Enrollment</a><br>
    <a href="index_course.php">Course</a><br>
    <a href="index_instructor.php">instructors</a>


</body>
</html>
