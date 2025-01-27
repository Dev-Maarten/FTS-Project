<?php
require "navbar.php";
require "connect.php";
ini_set('display_errors', '1');
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $db->error);
    }

    // Bind parameters
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "User registered successfully!";
        header("Location: account.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <title>Sign Up</title>
</head>
<body>
<div class="container" id="signup">
    <h1 class="form-title">Register</h1>
    <form method="post" action="account.php" enctype="multipart/form-data">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>

        <div class="input-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
        </div>

        <input type="submit" class="button" value="Register">
    </form>
    <div class="links">
        <p>Already have an account?</p>
        <a href="login.php">Log In</a>
    </div>
</div>
</body>
</html>
