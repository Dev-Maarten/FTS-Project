<?php require "navbar.php";
define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASSWORD', 'Snoes2425!');
define('DATABASE_NAME', 'festivals');
define('APP_URL', 'festivals.localhost');
define('APP_NAME', 'FTS');
$db = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
if (mysqli_connect_errno()) {
    die("connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale= 1.0">
    <link rel="Stylesheet" href="styles.css">
    <script src="script.js"></script>
    <title>FTS</title>
</head>
<body>
<? $query = 'SELECT name FROM festivals where id = 3';
$result = mysqli_query($db, $query);

if(!$result) {
    die("Error: " . mysqli_error($db));
}
?>
<div class="container">
    <h1 class="text-bold text-2xl text-center mb-4">
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $query = 'SELECT name, price, location FROM festivals where id in (2,3)';
        $result = mysqli_query($db, $query);

        $num_results = mysqli_num_rows($result);

        if(!$result) {
            die("Error: " . mysqli_error($db));
        }

        if($result && $num_results > 0);
            while ($rs = mysqli_fetch_array($result)) ;
            {
                print $rs;
                echo "<div class=\"shadow-lg bg-white rounded overflow-hidden\"> ";
                // echo "<img src=\"" . htmlspecialchars($rs['imagepath']) . " class=\"w-full object-cover\">";

                echo "<div class=\"p-4\">";
                echo "  <h2 class=\"text-2xl font-bold mb-3\">" . $rs['name'];
                echo "    </h2>";
                echo "    <p class=\"text-2xl font-bold mb-3\">" . $rs['price'];
                echo "    <p class=\"text-2xl font-bold mb-3\">" . $rs['location'];

        }
?>
            </div>
        </div>
</body>
