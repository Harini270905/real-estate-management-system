
<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Example: Using hardcoded login credentials for now
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'password123') {
        $_SESSION['username'] = $_POST['username'];
        header("Location: user_home.php"); // Redirect to the user home page after login
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

    <form method="POST" action="index.php">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>
