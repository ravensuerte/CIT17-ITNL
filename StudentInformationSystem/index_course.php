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
    <h2>Course List</h2>
    <nav>
        <ul>
            <li><a href="index_user.php">Users</a></li>
            <li><a href="index_instructor.php">Instructor</a></li>
            <li><a href="index_enrollment.php">Enrollment</a></li>
            <li><a href="index_student.php">Students</a></li>
        </ul>
        
</nav>
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
    <br>
    <a class="save" href="create_course.php">add New course</a>
    <a class="save" href="main.html">Go Back To main Menu</a>
</body>
</html>
