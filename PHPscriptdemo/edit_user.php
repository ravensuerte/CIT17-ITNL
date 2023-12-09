<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $userID = $_GET["id"];

    // Fetch user details
    $sql = "SELECT * FROM Users WHERE UserID = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateUser"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $userType = $_POST["userType"];

            // Validate user input if needed

            // Update user information
            $sqlUpdate = "UPDATE Users SET Username='$username', Password='$password', UserType='$userType' WHERE UserID = $userID";

            if ($conn->query($sqlUpdate) === TRUE) {
                // Redirect to the user list page after successful update
                header("Location: index_users.php");
                exit();
            } else {
                // Display an error message if the update fails
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        // Redirect to the user list page if user not found
        header("Location: index_users.php");
        exit();
    }
} else {
    // Redirect to the user list page if no user ID is provided
    header("Location: index_user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<!-- Edit User Form -->
<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $user['Username']; ?>" required>

    <label for="password">Password:</label>
    <input type="password" name="password">

    <label for="userType">User Type:</label>
    <select name="userType">
        <option value="Admin" <?php if ($user['UserType'] == 'Admin') echo 'selected'; ?>>Admin</option>
        <option value="Student" <?php if ($user['UserType'] == 'Student') echo 'selected'; ?>>Student</option>
        <option value="Instructor" <?php if ($user['UserType'] == 'Instructor') echo 'selected'; ?>>Instructor</option>
    </select>

    <input type="submit" name="updateUser" value="Update User">
</form>
    <a href="main.html">go back to Main Menu</a>
</body>
</html>
