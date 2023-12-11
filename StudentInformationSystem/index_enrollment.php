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
<style>
        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline;
        }
        .save{
            display: inline-block;
            padding: 10px 20px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 30px; /* Optional: Add rounded corners */
            transition: background-color 0.3s ease;
        }
    </style>
<h2>Enrollment List</h2>
<nav>
        <ul>
            <li><a href="index_user.php">Users</a></li>
            <li><a href="index_instructor.php">Instructor</a></li>
            <li><a href="index_course.php">Course</a></li>
            <li><a href="index_student.php">Students</a></li>
        </ul>
        
</nav>
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
<br>
    <a class="save" href="create_enrollment.php">New Enrollment</a>
    <a class="save" href="main.html">Go Back To main Menu</a>
</body>
</html>
