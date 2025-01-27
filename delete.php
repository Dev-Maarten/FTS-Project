<?php
require "connect.php";

if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $id = (int)$_POST['id'];

    $sql = "DELETE FROM `festivals` WHERE `id` = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Festival deleted successfully.";
        } else {
            echo "No festival found with this ID.";
        }

        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $db->error;
    }
} else {
    echo "Invalid ID.";
}

$url = "http://festivals.localhost/admin/adminview.php";
header("Location: $url");
exit;