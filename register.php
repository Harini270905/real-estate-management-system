
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            overflow-y: auto;
        }
        .container {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form action="includes/register_user.php" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
