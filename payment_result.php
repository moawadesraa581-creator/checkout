<?php
include "db.php";

$order_id = $_GET['cart_id'] ?? null;
$status = $_GET['respStatus'] ?? null;

if (!$order_id) {
    die("Order ID missing.");
}

if ($status === "A") {
    $conn->query("UPDATE orders SET status='paid' WHERE id='$order_id'");
    echo "<h2>Payment Successful ✅</h2>";
} else {
    echo "<h2>Payment Failed ❌</h2>";
}
?>
