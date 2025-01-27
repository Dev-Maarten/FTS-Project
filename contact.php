<?php
require "navbar.php";
require "connect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = mysqli_real_escape_string($db, $_POST['fname']);
$email = mysqli_real_escape_string($db, $_POST['E-mail']);
$body = mysqli_real_escape_string($db, $_POST['message']);


$query = "INSERT INTO contact (name, email, body) VALUES ('$name', '$email', '$body')";

if (mysqli_query($db, $query)) {
echo "<p>Thank you for contacting us, $name. Your message has been received.</p>";
} else {
echo "<p>Error: " . mysqli_error($db) . "</p>";
}
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="Stylesheet" href="styles.css">
    <script src="script.js"></script>
    <title>Contact</title>
</head>
<body>
<div class="container" id="signup">
    <h1 class="form-title">Contact</h1>
    <form method="post" action="">
        <div class="input-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="First Name" required>
        </div>

        <div class="input-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Last Name" required>
        </div>

        <div class="input-group">
            <label for="E-mail">E-mail</label>
            <input type="email" name="E-mail" id="E-mail" placeholder="E-mail" required>
        </div>

        <div class="input-group">
            <label for="message">Message</label>
            <input type="text" id="message" placeholder="Your message here" required></input>
        </div>

        <button type="submit" class="button">Submit</button>
    </form>
</div>
</body>
</html>