<?php
include 'db_config.php';

// SQL query to fetch all enrollments
$sql = "SELECT * FROM Enrollment";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment List</title>
</head>
<body>
    <h2>Enrollment List</h2>

    <table border="1">
        <tr>
            <th>EnrollmentID</th>
            <th>CourseID</th>
            <th>EnrollmentDate</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>

        <?php
        // Check if there are records in the result
        if ($result->num_rows > 0) {
            // Loop through the records and display them in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['EnrollmentID'] . "</td>";
                echo "<td>" . $row['StudentID'] . "</td>";
                echo "<td>" . $row['CourseID'] . "</td>";
                echo "<td>" . $row['EnrollmentDate'] . "</td>";
                echo "<td>" . $row['Grade'] . "</td>";
                echo "<td><a href='edit_enrollment.php?id=" . $row['EnrollmentID'] . "'>Edit</a> | <a href='delete_enrollment.php?id=" . $row['EnrollmentID'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="enrollment.php">Add New Enrollment</a>
</body>
</html>
