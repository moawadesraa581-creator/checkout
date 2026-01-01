<?php
require_once "db.php";

if (!isset($_POST['description']) || !isset($_POST['amount'])) {
    die("No data received");
}

$description = $_POST['description'];
$amount = $_POST['amount'];

$result = $conn->query(
    "INSERT INTO orders (description, amount, status)
     VALUES ('$description', '$amount', 'created')"
);

if (!$result) {
    die("DB Error: " . $conn->error);
}

$order_id = $conn->insert_id;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>

<h2>Checkout</h2>

<form method="post" action="success.php">
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

    <input type="text" placeholder="Customer Name" required><br><br>
    <input type="email" placeholder="Email" required><br><br>
    <input type="text" placeholder="Address" required><br><br>

    <button type="submit">Pay Now</button>
</form>

</body>
</html>