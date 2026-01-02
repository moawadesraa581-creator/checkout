<?php
// success.php
include "db.php";

$order_id = intval($_GET['order_id'] ?? 0);

if ($order_id <= 0) {
    die("Invalid order ID.");
}

// Insert payment
$stmt = $conn->prepare("INSERT INTO payments (order_id, payment_status) VALUES (?, 'success')");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$stmt->close();

// Update order status
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
<a href="create_order.php">Create Another Order</a>

</body>
</html>
