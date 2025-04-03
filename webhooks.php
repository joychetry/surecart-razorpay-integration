<?php
if (!defined('ABSPATH')) {
    exit;
}

// Handle SureCart Order Created Webhook
add_action('rest_api_init', function () {
    register_rest_route('surecart-razorpay/v1', '/surecart-webhook/', [
        'methods' => 'POST',
        'callback' => 'handle_surecart_webhook',
    ]);
});

function handle_surecart_webhook(WP_REST_Request $request) {
    $data = $request->get_json_params();

    if ($data['event'] == 'order.created') {
        $order_id = $data['data']['id'];
        $amount = $data['data']['total'] * 100; // Convert to paise
        $customer_email = $data['data']['customer']['email'];

        // Razorpay API Credentials
        $key_id = get_option('surecart_razorpay_key_id');
        $key_secret = get_option('surecart_razorpay_key_secret');

        // Create Razorpay Order
        $ch = curl_init("https://api.razorpay.com/v1/orders");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$key_id:$key_secret");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            "amount" => $amount,
            "currency" => "INR",
            "receipt" => $order_id,
            "payment_capture" => 1
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

        $response = curl_exec($ch);
        curl_close($ch);
        $razorpay_order = json_decode($response, true);

        return new WP_REST_Response([
            "order_id" => $razorpay_order['id'],
            "redirect_url" => site_url("/wp-json/surecart-razorpay/v1/checkout/?order_id={$razorpay_order['id']}")
        ], 200);
    }

    return new WP_REST_Response(['message' => 'Invalid event'], 400);
}

// Handle Razorpay Webhooks
add_action('rest_api_init', function () {
    register_rest_route('surecart-razorpay/v1', '/razorpay-webhook/', [
        'methods' => 'POST',
        'callback' => 'handle_razorpay_webhook',
    ]);
});

function handle_razorpay_webhook(WP_REST_Request $request) {
    $data = $request->get_json_params();

    if ($data['event'] == 'payment.captured') {
        $payment_id = $data['payload']['payment']['entity']['id'];
        $order_id = $data['payload']['payment']['entity']['order_id'];

        // Mark order as paid in SureCart
        $surecart_api_key = get_option('surecart_api_key');
        $ch = curl_init("https://api.surecart.com/orders/$order_id/mark-paid");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $surecart_api_key",
            "Content-Type: application/json"
        ]);
        curl_exec($ch);
        curl_close($ch);
    }

    return new WP_REST_Response(['message' => 'Webhook processed'], 200);
}