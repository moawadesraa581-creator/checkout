<?php
include "db.php";

$order_id = $_POST['order_id'];

$conn->query("INSERT INTO payments (order_id, payment_status)
VALUES ('$order_id', 'success')");

$conn->query("UPDATE orders SET status='paid' WHERE id='$order_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Success</title>
</head>
<body>

<h2>Payment Successful ✅</h2>
<p>Your order has been paid successfully.</p>

</body>
</html