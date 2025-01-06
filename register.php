
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="Stylesheet" href="styles.css">
    <script src="script.js"></script>
    <title>Document</title>
</head>
<body>
<?php require "navbar.php"; ?>
<div class="container" id="signup">
    <h1 class="form-title">registreren</h1>
    <form method="post" action="">
        <div class="input-group">
            <label for="fname">voornaam</label>
            <input type="text" name="fname" id="fname" placeholder="voornaam" required>

        </div>

        <div class="input-group">
            <label for="lname">achternaam</label>
            <input type="text" name="lname" id="lname" placeholder="achternaam" required>

        </div>

        <div class="input-group">
            <label for="E-mail">E-mail</label>
            <input type="text" name="E-mail" id="E-mail" placeholder="E-mail" required>

        </div>

        <div class="input-group">
            <label for="Password">wachtwoord</label>
            <input type="text" name="Password" id="Password" placeholder="Wachtwoord" required>

        </div>

        <form action="index.php">
            <input formaction="index.html" type="submit" class="button" value="registreer"> </form>

    </form>
    <div class="links">
        <p> heb je al een account?</p>
        <a href="login.php">log in</a>
    </div>
</div>

</body>
</html>
