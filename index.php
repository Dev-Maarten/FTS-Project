<?php


session_start();

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
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add a new festival</title>
</head>
<body>


<link rel="stylesheet" href="stylesheet.css">
    <script src="https://cdn.tailwindcss.com"></script>


    <?php if ($_SERVER['REQUEST_URI'] == 'website-folder/admin/admin.php/')
    ?>

    <section class="bg-gray-500">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl text-white font-bold mb-4">add a new festival</h2>
            <?php if (isset($create_festival_error)){ ?>
            <p class="text-red-500 mb4"><?php echo $create_festival_error; ?></p>
            <?php die; }?>

            <form action='admin.php' method="post" enctype="multipart/form-data">

                <div class="mb-4">
                    <label for="name" class="block mb-2>">name</label>
                    <input type="text" id="name" name="name" required
                           class="w-1/2 p-2 border rounded ">
                </div>

                <div class="mb-4">
                    <label for="location" class="block mb-2>">locatie</label>
                    <input type="text" id="location" name="location" required class="w-1/2 p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="duration" class="block mb-2>">duration</label>
                    <input type="text" id="duration" name="duration" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="vertrek" class="block mb-2>">vertrek</label>
                    <input type="text" id="vertrek" name="vertrek" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="price" class="block mb-2>">prijs</label>
                    <input type="text" id="price" name="price" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="image" class="block mb-2>">image</label>
                    <input type="file" id="image" name="image" class="w-full p-2 border-rounded">
                </div>

                <button type="submit" name="create_new_festival"  class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    add festival</button>

            </form>
    </section>
</body>
</html>