<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('rest_api_init', function () {
    register_rest_route('surecart-razorpay/v1', '/checkout/', [
        'methods' => 'GET',
        'callback' => 'surecart_razorpay_checkout',
    ]);
});

function surecart_razorpay_checkout(WP_REST_Request $request) {
    $order_id = $request->get_param('order_id');
    $key_id = get_option('surecart_razorpay_key_id');

    ob_start();
?>
<html>
<head>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
<script>
var options = {
    "key": "<?php echo $key_id; ?>",
    "order_id": "<?php echo $order_id; ?>",
    "handler": function (response) {
        window.location.href = "<?php echo site_url('/wp-json/surecart-razorpay/v1/razorpay-webhook/'); ?>";
    }
};
var rzp1 = new Razorpay(options);
rzp1.open();
</script>
</body>
</html>
<?php
    return ob_get_clean();
}
?>