<?php
include 'db_config.php';

// Read Users
$sql = "SELECT * FROM Users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="student_css/studentstyle.css">
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
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            
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
<h2>User Management</h2>
<nav>
        <ul>
            <li><a href="index_student.php">Student</a></li>
            <li><a href="index_enrollment.php">Enrollment</a></li>
            <li><a href="index_course.php">Course</a></li>
            <li><a href="index_instructor.php">Instructors</a></li>
        </ul>
        
</nav>
        
<div class="table-container">
<table border="1">
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>User Type</th>
        <th>Action</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['UserID']}</td>";
        echo "<td>{$row['Username']}</td>";
        echo "<td>{$row['Password']}</td>"; 
        echo "<td>{$row['UserType']}</td>";
        echo "<td><a href='edit_user.php?id={$row['UserID']}'>Edit</a> | <a href='delete_user.php?id={$row['UserID']}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</div>
<a class="save" href="create_user.php">add Users</a>
<a class="save" href="main.html">Go Back To main Menu</a>
</body>
</html>
