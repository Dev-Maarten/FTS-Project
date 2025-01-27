<?php
require "navbar.php";
require "connect.php";
ini_set('display_errors', '0');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    if (!$stmt) {
        die("Database error: " . $db->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION['user_id'] = $user["id"];
            $_SESSION['username'] = $user["username"];

            header("Location: account.php");
            exit;
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
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
    <title>Inloggen</title>
</head>
<body>
<div class="container" id="Login">
    <h1 class="form-title">Inloggen</h1>
    <form method="post" action="account.php" enctype="multipart/form-data">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>

        <div class="input-group">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" placeholder="Wachtwoord" required>
        </div>

        <input type="submit" class="button" value="Log in">

        <div class="links">
            <p>Heb je nog geen account?</p>
            <a href="register.php">Registreer nu!</a>
        </div>
    </form>
</div>
</body>
</html>
