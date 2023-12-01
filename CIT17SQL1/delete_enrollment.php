<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $enrollmentID = $_GET['id'];

    // SQL query to delete enrollment by ID
    $deleteSql = "DELETE FROM Enrollment WHERE EnrollmentID = '$enrollmentID'";

    if ($conn->query($deleteSql) === TRUE) {
        header("Location: index_enrollemnt.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
    exit();
}
?>
