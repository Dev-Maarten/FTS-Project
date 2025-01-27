<?php
require "fpdf.php";
require "connect.php";

ini_set('display_errors', '1');

if (isset($_GET['id'])) {
    $festival_id = $_GET['id'];
} else {
    die("Festival ID is required.");
}
$stmt = $db->prepare("SELECT * FROM `festivals` WHERE `id` = ?");
$stmt->bind_param("i", $festival_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && mysqli_num_rows($result) > 0) {
    while ($festival = mysqli_fetch_assoc($result)) {
        ?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <script src="https://cdn.tailwindcss.com"></script>
            <title>Boek uw reis</title>
        </head>
        <body>

        <h1 class="text-2xl text-white font-bold mb-4 text-center">Uw boeking</h1>

        <div class="bg-gray-200 cover">

            <form action="confirmation.php" method="POST" >
                <input type="hidden" name="id" value="<?php echo $festival['id']; ?>">

                <div class="mb-4">
                    <label for="name" class="block mb-2">Name</label>
                    <input type="text" id="name" name="name" required class="w-full p-2 border rounded">
                </div>

                <div class="mb-4">
                    <h2>Depart from:</h2>
                    <input type="text" id="vertrekpunt" name="vertrekpunt" value="<?php echo $festival['vertrekpunt']; ?>" readonly>
                    <input type="hidden" name="vertrekpunt" value="<?php echo $festival['vertrekpunt']; ?>">

                </div>

                <div class="mb-4">
                    <h2>Destination:</h2>
                    <input type="text" id="bestemming" name="bestemming" value="<?php echo $festival['name']; ?>" readonly>
                    <input type="hidden" name="bestemming" value="<?php echo $festival['name']; ?>">

                </div>

                <div class="mb-4">
                    <h2>Price:</h2>
                    <input type="text" id="price" name="price" value="<?php echo $festival['price']; ?>" readonly>
                    <input type="hidden" name="price" value="<?php echo $festival['price']; ?>">

                </div>

                <div class="mb-4">
                    <h2>Date:</h2>
                    <input type="text" id="vertek" name="vertrek" value="<?php echo $festival['vertrek']; ?>" readonly>
                    <input type="hidden" name="vertrek" value="<?php echo $festival['vertrek']; ?>">

                </div>

                <label for="option">Choose a timestamp</label>
                <select id="option" name="option" required>
                    <option value="" disabled selected>Select a time</option>
                    <?php
                    $result = $db->query("SELECT time, time2 FROM festivals");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['time']}'>{$row['time2']}</option>";
                    }
                    ?>
                </select>

                <div class="mb-4">
                    <label for="personen" class="block mb-2">Number of people</label>
                    <input type="text" id="personen" name="personen" class="w-full p-2 border-rounded" required>
                </div>

                <button type="submit" name="confirm" value="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Confirm Booking
                </button>

            </form>
        </div>
        </body>
        </html>

        <?php
    }
}
?>