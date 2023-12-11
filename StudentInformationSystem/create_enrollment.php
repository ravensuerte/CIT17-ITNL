<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect user input for enrollment information
    $enrollmentID = $_POST['enrollmentID'];
    $enrollmentDate = $_POST['enrollmentDate'];
    $grade = $_POST['grade'];

    // Fetch StudentID and CourseID based on user input
    $studentID = $_POST['studentID'];
    $courseID = $_POST['courseID'];

    // Check if the specified studentID exists in the Student table
    $checkStudent = "SELECT * FROM Student WHERE StudentID = $studentID";
    $resultStudent = $conn->query($checkStudent);

    // Check if the specified courseID exists in the Course table
    $checkCourse = "SELECT * FROM Course WHERE CourseID = $courseID";
    $resultCourse = $conn->query($checkCourse);

    if ($resultStudent->num_rows == 0) {
        echo "Error: No student found with Student ID $studentID.";
    } elseif ($resultCourse->num_rows == 0) {
        echo "Error: No course found with Course ID $courseID.";
    } else {
        // Both studentID and courseID exist, proceed with the enrollment
        $sql = "INSERT INTO Enrollment (EnrollmentID, StudentID, CourseID, EnrollmentDate, Grade) 
                VALUES ('$enrollmentID', '$studentID', '$courseID', '$enrollmentDate', '$grade')";

        if ($conn->query($sql) === TRUE) {
            echo "Enrollment information saved successfully!";
            header("Location: index_enrollment.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Enrollment</title>
    <link rel="stylesheet" href="student_css/studentstyle.css">
</head>
<body>
    <style>
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
    <h2>Create Enrollment</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="studentID">Student ID:</label>
        <input type="number" name="studentID" required><br>

        <label for="courseID">Course ID:</label>
        <input type="number" name="courseID" required><br>

        <label for="enrollmentDate">Enrollment Date:</label>
        <input type="date" name="enrollmentDate" required><br>

        <label for="grade">Grade:</label>
        <input type="text" name="grade"><br>

        <input type="submit" value="Save">
    </form>
    <br>
    <a class="save" href="index_enrollment.php">Go back to Enrollment</a>
</body>
</html>
