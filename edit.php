<?php

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
if(str_contains($_SERVER["REQUEST_URI"],"edit.php")) {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) { //check id
        die("Invalid or missing ID.");
    }

    $festival_detail = isset($_GET['id']) ? $_GET['id'] : 0; //get id from url

    $stmt = $db->prepare("SELECT * FROM `festivals` WHERE `id` = ?"); // prepare queries
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $festival_detail = $stmt->get_result()->fetch_assoc();

    if (!$festival_detail) {

            echo "Debugging: Festival not found. Query result is empty.<br>";
            echo "ID being searched: " . htmlspecialchars($festival_id) . "<br>";
            echo "SQL Error (if any): " . $db->error . "<br>";
            die();
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update festival'])) {
        $name = $_GET['name'] ?? '';
        $location = $_GET['location'] ?? '';
        $duration = $_GET['duration'] ?? '';
        $vertrek = $_GET['vertrek'] ?? '';
        $price = $_GET['price'] ?? '';

        if(isset($_FILES['image'])  && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = uniqueid() .'.'. pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
        }

        $query = " UPDATE festivals SET name = ?, location = ?, duration = ?, vertrek = ?, price = ?,";
        if($image) {
            $query .= " image = ?";
            $params[] = $image;
        }
        $query .= "WHERE id = ?";
        $params[] = $festival_id;

        $sql = "SELECT * FROM festivals WHERE id = $festival_detail";
    $result = $db->query($sql); // get data from database

    if ($result && $result->num_rows > 0) {
        $festival_detail = $result->fetch_assoc() ;  // check if result was foudn
        }

    $id = (int)$_GET['id'];    if (!$festival_detail) {

    }
        echo "Festival name: " . htmlspecialchars($festival_detail)['name'];
    }
    else {
        die("no festival found");
    }

    $stmt = $db->prepapre($query);
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);
    $stmt->execute();
    $stmt->close();

}
        if(!$id) {
            header("Location: /admin");
            exit;
        }
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit festival</title>
    <link href="stylesheet.css" rel="stylesheet">
</head>
<body>

</body>
</html>
<section class="bg-gray-500">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl text-white font-bold mb-4">edit festival</h2>


            <form action="admin.php" method="post">
                <div class="mb-4">
                    <label for="name" class="block mb-2>">name</label>
                    <input type="text" id="name" name="name" value="<?php echo $festival_detail['name'];?>" required class="w-1/2 p-2 border rounded ">
                </div>

                <div class="mb-4">
                    <label for="location" class="block mb-2>">locatie</label>
                    <input type="text" id="location" name="location" value="<?php echo $festival_detail['locatie'];?>" required class="w-1/2 p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="rating" class="block mb-2>">rating</label>
                    <input type="text" id="rating" name="rating" value="<?php echo $festival_detail['rating'];?>" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="duration" class="block mb-2>">duration</label>
                    <input type="text" id="duration" name="duration" value="<?php echo $festival_detail['duration'];?>" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="vertrek" class="block mb-2>">vertrek</label>
                    <input type="text" id="vertrek" name="vertrek" value="<?php echo $festival_detail['vertrek'];?>" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="price" class="block mb-2>">prijs</label>
                    <input type="text" id="price" name="price" value="<?php echo $festival_detail['prijs'];?>" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="image" class="block mb-2>">image</label>
                    <input type="file" id="image" name="image" value="<?php echo $festival_detail['image'];?>" class="w-full p-2 border-rounded">
                </div>

                <button type="submit" name="update festival"  class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    update festival</button>

            </form>
    </section>
