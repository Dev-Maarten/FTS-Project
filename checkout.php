<?php
require "connect.php";

session_start();


$price = $_POST['price'];
$discount = 0;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $coupon_code = trim($_POST['coupon_code']);

    $stmt = $db->prepare("SELECT * FROM coupons WHERE code = ?");
    $stmt->bind_param("s", $coupon_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0){
        echo 'invalid coupon';
        exit;
    }

    if($result->num_rows > 1){
        $coupon_code = $result->fetch_assoc();
        $discount = 0;

        if($coupon_code['type'] === 'percentage'){
            $discount = ($coupon_code['value'] / 100) * $price;
        }

        $discount = min($discount, $price);
        $price = $price - $discount;

        $update_user = $db->prepare("UPDATE coupons SET points = points - ? WHERE id = ?");
        $update_user->bind_param("ii", $points, $user_id);

        if($update_user->execute()) {
            $mark_redeemed = $db->prepare("UPDATE coupons SET is_redeemed = 1 WHERE id = ?");
            $mark_redeemed->bind_param("i", $coupon_code);
            $mark_redeemed->execute();
        }

        echo "coupon applied! discount: $discount new price: $price";

    }
}

?> <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>final confirmation</title>
</head>
<body>
<form action="http://127.0.0.1:8000" Method="POST">
    <h1>proceed to checkout</h1>
    <button type="submit" value="proceed"></button>
</form>
</body>
</html>