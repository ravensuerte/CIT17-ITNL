<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $enrollmentID = $_GET['id'];

    // SQL query to delete enrollment by ID
    $deleteSql = "DELETE FROM Enrollment WHERE EnrollmentID = '$enrollmentID'";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Enrollment deleted successfully!";
        header("Location: index_enrollment.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
