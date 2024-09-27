<?php
// Get the payload sent from the client
$input = file_get_contents('php://input');
$data = json_decode($input, true);

$token = $data['token'];  // Token received from Khalti frontend
$amount = $data['amount'];  // Amount received from Khalti frontend

// Khalti Secret Key
$secretKey = "4a85283613244de9a5bd52cba0313fce";

// Prepare the request for verification
$url = "https://khalti.com/api/v2/payment/verify/";
$args = http_build_query(array(
    'token' => $token,
    'amount' => $amount
));

// Setup request headers
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Key $secretKey"
));

// Execute the request
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Return response to frontend
if ($status_code == 200) {
    echo json_encode(array('status' => 'success', 'message' => 'Payment verified successfully!'));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Payment verification failed!'));
}
?>