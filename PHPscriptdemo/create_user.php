<?php
include 'db_config.php';

// Create User
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createUser"])) {
    $username = $_POST["username"];
    $password = $_POST["password"]; // Do not hash the password
    $userType = $_POST["userType"];

    $sql = "INSERT INTO Users (Username, Password, UserType) VALUES ('$username', '$password', '$userType')";
    if ($conn->query($sql) === TRUE) {
        echo "Users information saved successfully!";
        header("Location: index_user.php");
        exit();

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- Add Bootstrap or CSS link here -->
</head>
<body>

<h2>Create User</h2>

<!-- Create User Form -->
<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <label for="userType">User Type:</label>
    <select name="userType">
        <option value="Admin">Admin</option>
        <option value="Student">Student</option>
        <option value="Instructor">Instructor</option>
    </select>

    <input type="submit" name="createUser" value="Create User">
</form>
    <a href="index_user.php">Go back to users</a>
</body>
</html>
