<?php
include 'db_config.php';

// SQL query to fetch all instructors
$sql = "SELECT * FROM Instructor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Instructors</title>
    <link rel="stylesheet" href="instructor_css/instructor.css">
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
    <h2>Instructor List</h2>
    <nav>
        <ul>
            <li><a href="index_user.php">Users</a></li>
            <li><a href="index_enrollment.php">Enrollment</a></li>
            <li><a href="index_course.php">Course</a></li>
            <li><a href="index_student.php">Students</a></li>
        </ul>
        
</nav>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Instructor ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["InstructorID"] . "</td>";
            echo "<td>" . $row["FirstName"] . "</td>";
            echo "<td>" . $row["LastName"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Phone"] . "</td>";
            echo "<td><a href='edit_instructor.php?id={$row['InstructorID']}'>Edit</a> | <a href='delete_instructor.php?id={$row['InstructorID']}'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No instructors found.";
    }

    // Close the database connection
    $conn->close();
    ?>
    <br>
    <a class="save" href="create_instructor.php">add new Instructor</a>
    <a class="save" href="main.html">Go Back To main Menu</a>
</body>
</html>
