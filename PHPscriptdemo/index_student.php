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
    <link rel="stylesheet" href="student_css/studentstyle.css">
    <style>
        
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
    </style>
</head>
<body>
<h2>Student List</h2>
        <a href="index_enrollment.php">Enrollment</a><br>
        <a href="index_course.php">Course</a><br>
        <a href="index_instructor.php">Instructors</a>
    <div class="table-container">
  

        <?php
        if ($result->num_rows > 0) {
            echo '<table class="table" border="1">';
            echo '<tr>
                    <th>StudentID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>';

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

            echo '</table>';
        } else {
            echo '<p>No student records found.</p>';
        }
        ?>
    </div>
    <a href="create_student.php">Add student</a>
</body>
</html>
