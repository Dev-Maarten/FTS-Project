<?php
require "connect.php";
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<div class="bg-gray-100">

    <h2 class="text-black font-bold py-2 px-4 text-2xl mb-4 text-center">Admin Panel</h2>
    <p class="text-center text-black py-2 px-4 text-1xl"> Welcome to the admin panel</p>

    <a href="index.php" class="fixed bottom-0 right-0 left-0 bg-green-500 hover:bg-green-600 text-white text-center font-bold py-2 rounded mb-6">
        add a new festival</a>

</div>

<table class="w-full bg-white shadow-md rounded mb-6">
    <thead>
    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <th class="py-3 px-6 text-center"> name</th>
        <th class="py-3 px-6 text-center"> location</th>
        <th class="py-3 px-6 text-center"> duration</th>
        <th class="py-3 px-6 text-center"> actions</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
    <?php $result = mysqli_query($db, "SELECT * FROM festivals.festivals");
    if ($result && mysqli_num_rows($result) > 0) {
    while ($festival = mysqli_fetch_assoc($result)) {
     ?>
    <tr>
        <td class="py-3 px-6 text-center"><?php echo htmlspecialchars($festival['name']); ?></td>
        <td class="py-3 px-6 text-center"><?php echo htmlspecialchars($festival['location']); ?></td>
        <td class="py-3 px-6 text-center"><?php echo htmlspecialchars($festival['duration']); ?></td>
        <td class="py-3 px-6 text-center">

            <a href="edit.php?id=<?php echo $festival['id']; ?>" class=" bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded inline-block">
                Edit</a>
            <form method="POST" action="delete.php" class="inline-block">
                <input type="hidden" name="id" value="<?php echo $festival['id']; ?>">
                <button type="submit" name="delete_Festival" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Are you sure?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    <?php }
    } else {
        echo "<tr><td colspan='4' class='text-center py3'>No festivals found.</td></tr>";
    }
    ?>
</body>
</html>

