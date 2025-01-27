<?php
require "connect.php";

if(isset($_POST['create_new_festival'])) {


    $name = $_REQUEST['name'];
    $location = $_REQUEST['location'];
    $duration = $_REQUEST['duration'];
    $vertrek = $_REQUEST['vertrek'];
    $vertrekpunt = $_REQUEST['vertrekpunt'];
    $price = floatval($_REQUEST['price']);
    $description = $_REQUEST['description'];
    $time = $_REQUEST['time'];
    $time2 = $_REQUEST['time2'];



    $target_dir = "../uploads/";

$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imagepath = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($uploadOk) {

        $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";

      $query = "INSERT INTO festivals (name, location, duration, vertrek, vertrekpunt, time, time2, price, description, imagepath) VALUES ('$name','$location', '$duration', '$vertrek', '$vertrekpunt', '$time', '$time2', $price, '$description', '$imagepath')";

      $uploadOk = 1;


      if (mysqli_query($db, $query)) {
          echo "new festival added successfully";

      } else echo "failed to add new festival";

  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
            echo "there was an error uploading your file.";
        }
    }

}
$url ="http://festivals.localhost/admin/adminview.php";
header("Location: $url");
die()
?>

