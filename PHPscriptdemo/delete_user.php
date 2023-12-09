<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $userID = $_GET["id"];

    // Delete user
    $sqlDelete = "DELETE FROM Users WHERE UserID = $userID";
    $conn->query($sqlDelete);

    // Redirect to the user list page after delete
    header("Location: index_user.php");
    exit();
} else {
    // Redirect to the user list page if no user ID is provided
    header("Location: index_user.php");
    exit();
}
?>
