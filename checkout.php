<?php
// checkout.php
include "db.php";

// Validation: تأكد إن البيانات موجودة من create_order.php
if (!isset($_POST['description']) || !isset($_POST['amount'])) {
    echo "<p style='color:red;'>Error: No order data received. Please go back to <a href='create_order.php'>Create Order</a>.</p>";
    exit;
}

$description = htmlspecialchars($_POST['description']);
$amount = floatval($_POST['amount']);

// Insert order into DB
$stmt = $conn->prepare("INSERT INTO orders (description, amount, status) VALUES (?, ?, 'created')");
$stmt->bind_param("sd", $description, $amount);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>

<h2>Checkout</h2>

<form method="post" action="paytabs_request.php">
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
    <input type="hidden" name="amount" value="<?php echo $amount; ?>">

    <label>Customer Name:</label><br>
    <input type="text" name="customer_name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="customer_email" required><br><br>

    <button type="submit">Pay with PayTabs</button>
</form>

</body>
</html>
