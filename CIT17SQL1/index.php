<?php
include 'db_config.php';

// SQL query to fetch all students
$sql = "SELECT * FROM Student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        body{
            background-color: gray;
            text-align: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }
        table{
            margin-left: 300px;
        }
        a{
            color: blue;
        }
    </style>
</head>
<body>
    
    <h2>Student List</h2>

    <table border="1">
        <tr>
            <th>StudentID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>DateOfBirth</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

        <?php
        // Check if there are records in the result
        if ($result->num_rows > 0) {
            // Loop through the records and display them in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['StudentID'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['DateOfBirth'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td><a href='edit_student.php?id=" . $row['StudentID'] . "'>Edit</a> | <a href='delete_student.php?id=" . $row['StudentID'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="create_student.php">Add New Student</a>
    <a href="enrollment.php">Enrollment</a>
</body>
</html>
