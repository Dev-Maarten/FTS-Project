<!doctype html>
<?php require"navbar.php";
require "connect.php";


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $festival_id = (int)$_GET['id'];
} else {
    die("missing id");
}

$query = "SELECT * FROM festivals WHERE id= $festival_id ";
$result = mysqli_query($db, $query);

$num_results = mysqli_num_rows($result);

        if(!$result) {
            die("Error: " . mysqli_error($db));
        }

        if($result && $num_results > 0);
            while ($rs = mysqli_fetch_array($result))
            {
                $foto = $rs['imagepath'];
                $description = $rs['description'];
                $vertrek = $rs['vertrek'];


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title><?php echo htmlspecialchars($rs['name']); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex flex-row justify-center items-stretch object-bottom h-[70vh]">
    <div class="w-1/4 bg-gray-300 border-2 border-black">
        <img src="<?php echo $rs['imagepath']; ?>" class="w-full object-cover">

    </div>
    <div class="flex-grow bg-white">
        <h1 class="text-center text-bold text-2xl">Festival Details <br></h1>
        <p><br><?php echo htmlspecialchars($rs['description']); ?></p>


    </div>
    <div class="w-1/4 bg-gray-300 border-2 border-black">
        <h1 class="text-center text-bold text-2xl">vertrektijden</h1>
        <p><?php echo $rs['time']; ?> </p>        <br>
        <h1 class="text-center text-bold text-2xl">vertrekdatum</h1>
        <p><?php echo $rs['vertrek']; ?> </p>
    </div>
    <a href="booking.php?id=<?php echo $festival_id; ?>" class="fixed bottom-0 right-0 left-0 bg-green-500 hover:bg-green-600 text-white text-center font-bold py-2 rounded mb-6">
        boek uw ticket </a>

</div>
</body>
</html>
<?php }  ?>