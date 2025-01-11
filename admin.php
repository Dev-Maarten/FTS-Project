<?php


echo 'Current directory: ' . getcwd();

define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', 'Snoes2425!');
define('DATABASE_NAME', 'Festivals');
define('APP_URL', 'festivals.localhost');
define('APP_NAME', 'FTS');
$db = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
if (mysqli_connect_errno()) {
    die("connection failed: " . mysqli_connect_error());
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
<link href="stylesheet.css" rel="stylesheet">

</head>

<body>


<div class="antialiased bg-gray-100">
    <?php

    if ($_SERVER['REQUEST_URI'] == '/admin' || $_SERVER['REQUEST_URI'] == '/admin/admin.php'):
    ?>
    <h2>Admin Panel</h2>
    <p> Welcome to the admin panel</p>

    <a href="index.php" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded inline-block mb-6">
        add a new festival
</div>

<table class="w-full bg-white shadow-md rounded mb-6">
    <thead>
    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <th class="py-3 px-6 text-left"> name</th>
        <th class="py-3 px-6 text-left"> location</th>
        <th class="py-3 px-6 text-center"> rating</th>
        <th class="py-3 px-6 text-center"> actions</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
    <?php $result = mysqli_query($db, "SELECT * FROM festivals");
    if ($result) {
    while ($festival = mysqli_fetch_assoc($result))

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['create_festival']))
            $name =$_POST['name'] ?? '';
    $location =$_POST['locatie'] ?? '';
    $rating =$_POST['rating'] ?? '';
    $duration =$_POST['duration'] ?? '';
    $vertrek =$_POST['vertrek'] ?? '';
    $price =$_POST['prijs'] ?? '';

    if(empty($name) || empty($location) || empty($rating) || empty($duration) || empty($vertrek) || empty($price))
        $create_festival_error ="all fields are required";

    $slug =strtolower(preg_replace('/^a-z0-9}+/', '-' , strtolower($name)));

    if(isset($_FILES))?>
    <tr>
        <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($festival['name']); ?></td>
        <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($festival['location']); ?></td>
        <td class="py-3 px-6 text-center"><?php echo htmlspecialchars($festival['rating']); ?></td>
        <td class="py-3 px-6 text-center">

            <a href="/admin/edit-festivals?id=<?php echo $festival['id'];?>" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded inline-block">
                Edit</a>
            <form method="POST" action="/admin/delete-festival? id=<?php echo $festival['id']; ?>" class="inline-block">
                <button type="submit" name="delete_Festival" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Are you sure?')">
                    Delete
                </button>
        </td>
    </tr>
    <?php
    } else {
        echo "<tr><td colspan='4' class='text-center py3'>No festivals found.</td></tr>";
    }
    ?>
    <?php endif?>


</body>
</html>

