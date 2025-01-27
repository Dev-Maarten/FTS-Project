<?php
require "connect.php";

if(str_contains($_SERVER["REQUEST_URI"],"edit.php")) {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) { //check id
        die("Invalid or missing ID.");
    }

    $festival_id = (int)$_GET['id'];

    $stmt = $db->prepare("SELECT * FROM `festivals` WHERE `id` = ?"); // prepare queries
    $stmt->bind_param("i", $festival_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $festival_detail = $result->fetch_assoc();

    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update festival'])) {
        $name = $_GET['name'] ?? '';
        $location = $_GET['location'] ?? '';
        $duration = $_GET['duration'] ?? '';
        $vertrek = $_GET['vertrek'] ?? '';
        $price = $_GET['price'] ?? '';
        $description = $_GET['description'] ?? '';
        $time = $_GET['time'] ?? '';

        var_dump($_POST);
        $image = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
        }

        $query = " UPDATE festivals SET name = ?, location = ?, duration = ?, vertrek = ?, price = ?, description = ?";
        $params = [$name, $location, $duration, $vertrek, $price, $description];
        $types = "sssds";

        if ($image) {
            $query .= ", image = ?";
            $params[] = $image;
            $types .= "s";
        }

        $query .= "WHERE id = ?";
        $params[] = $festival_id;
        $types .= "i";


        echo "generated query: " . $query; "<br>";
        echo "parameters: ";
        print_r($params);

        $stmt = $db->prepare($query);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();


        if ($stmt->affected_rows > 0) {
            header("Location: /admin/admin.php");
            exit;
        } else  {
            echo"no changes made";
        }
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
    <title>edit festival</title>
    <link href="stylesheet.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

</body>
</html>
<section class="bg-gray-500">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl text-white font-bold mb-4">edit festival</h2>


            <form action="admin.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="name" class="block mb-2>">name</label>
                    <input type="text" id="name" name="name" value="<?php echo $festival_detail['name'];?>" required class="w-full p-2 border rounded ">
                </div>

                <div class="mb-4">
                    <label for="location" class="block mb-2>">locatie</label>
                    <input type="text" id="location" name="location" value="<?php echo $festival_detail['location'];?>" required class="w-full p-2 border-rounded">
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
                    <input type="text" id="price" name="price" value="<?php echo $festival_detail['price'];?>" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-2>">description</label>
                    <input type="text" id="description" name="description" value="<?php echo $festival_detail['description'];?>" required class="w-full p-2 border-rounded">
                </div>

                <div class="mb-4">
                    <label for="image" class="block mb-2>">image</label>
                    <input type="file" id="image" name="image"  class="w-full p-2 border-rounded">
                </div>

                <button type="submit" name="update festival"  class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    update festival</button>

            </form>
    </section>
