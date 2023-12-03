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
</head>
<body>
    <h2>Instructor List</h2>

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
    <a href="create_instructor.php">add new Instructor</a>
    <a href="index.php">go back to student</a>
</body>
</html>
