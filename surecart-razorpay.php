<?php
/**
 * Plugin Name: SureCart Razorpay Integration
 * Description: Integrates SureCart with Razorpay for payment processing.
 * Version: 1.0
 * Author: Joy Chetry
 * Author URI: https://joychetry.com
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

// Include necessary files
include_once plugin_dir_path(__FILE__) . 'admin-settings.php';
include_once plugin_dir_path(__FILE__) . 'webhooks.php';

// Activate plugin - Create necessary options
function surecart_razorpay_activate() {
    add_option('surecart_razorpay_key_id', '');
    add_option('surecart_razorpay_key_secret', '');
    add_option('surecart_api_key', '');
}
register_activation_hook(__FILE__, 'surecart_razorpay_activate');

// Deactivate plugin - Cleanup options
function surecart_razorpay_deactivate() {
    delete_option('surecart_razorpay_key_id');
    delete_option('surecart_razorpay_key_secret');
    delete_option('surecart_api_key');
}
register_deactivation_hook(__FILE__, 'surecart_razorpay_deactivate');