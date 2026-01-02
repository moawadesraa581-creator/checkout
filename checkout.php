<form method="post" action="paytabs_request.php">
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
    <input type="hidden" name="amount" value="<?php echo $amount; ?>">

    <button type="submit">Pay with PayTabs</button>
</form>
