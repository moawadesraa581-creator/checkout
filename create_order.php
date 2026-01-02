<?php
// create_order.php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
</head>
<body>

<h2>Create Order</h2>

<form method="post" action="checkout.php">
    <input type="text" name="description" placeholder="Order Description" required><br><br>
    <input type="number" name="amount" placeholder="Amount" required min="1" step="0.01"><br><br>
    <button type="submit">Create Order</button>
</form>

</body>
</html>
