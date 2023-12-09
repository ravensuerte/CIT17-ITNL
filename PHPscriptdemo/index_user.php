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
        
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
    </style>
<h2>User Management</h2>
        <a href="index_student.php">Student</a><br>
        <a href="index_enrollment.php">Enrollment</a><br>
        <a href="index_course.php">Course</a><br>
        <a href="index_instructor.php">Instructors</a>
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
<a href="create_user.php">add Users</a>
</body>
</html>
