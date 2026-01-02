<?php
include "db.php";

$order_id = $_POST['order_id'];
$amount = floatval($_POST['amount']);
$amount = number_format($amount, 2, '.', '');
$amount = "100.00";


$data = [
    "profile_id" => 132344,
    "tran_type" => "sale",
    "tran_class" => "ecom",
    "cart_id" => $order_id,
    "cart_description" => "Checkout Order Payment",
    "cart_currency" => "EGP",
    "cart_amount" => $amount,
    "return" => "http://localhost/checkout/payment_result.php"
];

$ch = curl_init("https://secure-egypt.paytabs.com/payment/request");

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "authorization: SWJ992BZTN-JHGTJBWDLM-BZJKMR2ZHT",
    "content-type: application/json"
]);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if (isset($result['redirect_url'])) {
    header("Location: " . $result['redirect_url']);
    exit;
} else {
    echo "<h3>PayTabs Response</h3>";
    echo "<pre>";
    print_r($result);
    echo "</pre>";
}


