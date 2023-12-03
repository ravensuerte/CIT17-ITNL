<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $instructorID = $_GET['id'];

    // SQL query to delete instructor by ID
    $sql = "DELETE FROM Instructor WHERE InstructorID = '$instructorID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_instructor.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
