<?php
require "connect.php";
require "navbar.php";

ini_set('display_errors', '0');

session_start();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Punten</title>
</head>

<body>

<div class="container">
    <h1 class="text-black text-2xl flex justify-center">je bent ingelogd! <? echo ($_SESSION['username']); ?></h1><br>
    <a href="logout.php" class="text-black text-1xl flex justify-start">logout</a>

</div>
