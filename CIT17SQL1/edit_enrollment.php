<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $enrollmentID = $_GET['id'];

    // SQL query to fetch enrollment details by ID
    $sql = "SELECT * FROM Enrollment WHERE EnrollmentID = '$enrollmentID'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $enrollmentID = $row['EnrollmentID'];

        $enrollmentDate = $row['EnrollmentDate'];
        $grade = $row['Grade'];
    } else {
        echo "Enrollment not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

// Update enrollment information
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollmentID = $_POST['enrollmentID'];
    $courseID = $_POST['courseID'];
    $enrollmentDate = $_POST['enrollmentDate'];
    $grade = $_POST['grade'];

    // SQL query to update enrollment information
    $updateSql = "UPDATE Enrollment SET EnrollmentID = '$enrollmentID',
                  EnrollmentDate = '$enrollmentDate', Grade = '$grade' 
                  WHERE EnrollmentID = '$enrollmentID'";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: index_enrollemnt.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Enrollment</title>
</head>
<body>
    <h2>Edit Enrollment</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"] . '?id=' . $enrollmentID; ?>" method="post">
        <label for="enrollmentID">Enrollment ID:</label>
        <!-- You can replace this dropdown with data fetched from the Student table -->
        <input type="number" name="enrollmentID" required>
         
            <!-- Add more options as needed -->


            <!-- Add more options as needed -->
        </select><br>

        <label for="enrollmentDate">Enrollment Date:</label>
        <input type="date" name="enrollmentDate" value="<?php echo $enrollmentDate; ?>" required><br>

        <label for="grade">Grade:</label>
        <input type="text" name="grade" value="<?php echo $grade; ?>"><br>

        <input type="submit" value="Update Enrollment">
    </form>

    <br>
    <a href="index_enrollemnt.php">Back to Enrollment List</a>
</body>
</html>
