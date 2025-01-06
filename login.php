<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="Stylesheet" href="styles.css">
    <script src="script.js"></script>
    <title>Inloggen</title>
</head>

<body>
<?php require "navbar.php"; ?>

<div class="container" id="Login">
    <h1 class="form-title">Inloggen</h1>
    <form method="post" action="">
    <div class="input-group">
        <label for="E-mail">E-mail</label>
        <input type="text" name="E-mail" id="E-mail" placeholder="E-mail" required>

    </div>

    <div class="input-group">
        <label for="Password">wachtwoord</label>
        <input type="text" name="Password" id="Password" placeholder="Wachtwoord" required>


    </div>

        <form action="index.html">
            <input type="submit" class="button" value="log in" ></form>

        <div class="links">
            <p> heb je nog geen account?</p>
            <a href="register.php">registreer nu!</a>
        </div>
</form>
</div>
</body>
</html>