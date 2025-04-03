<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', function () {
    add_menu_page('SureCart Razorpay Settings', 'SC Razorpay', 'manage_options', 'surecart-razorpay', 'surecart_razorpay_settings', 'dashicons-admin-generic', 56);
});

function surecart_razorpay_settings() {
    if ($_POST) {
        update_option('surecart_razorpay_key_id', sanitize_text_field($_POST['key_id']));
        update_option('surecart_razorpay_key_secret', sanitize_text_field($_POST['key_secret']));
        update_option('surecart_api_key', sanitize_text_field($_POST['surecart_api_key']));
        echo '<div class="updated"><p>Settings saved successfully.</p></div>';
    }

    $key_id = get_option('surecart_razorpay_key_id');
    $key_secret = get_option('surecart_razorpay_key_secret');
    $surecart_api_key = get_option('surecart_api_key');
?>
    <div class="sc-razorpay-settings">
        <header>
            <div class="logo">
                <h1>SureCart Razorpay</h1>
            </div>
            <button type="submit" form="sc-razorpay-form" class="save-button">
                <i class="ti-save"></i> Save Settings
            </button>
        </header>

        <form method="post" id="sc-razorpay-form">
            <div class="form-group">
                <label><i class="ti-key"></i> Razorpay Key ID</label>
                <input type="text" name="key_id" value="<?php echo esc_attr($key_id); ?>" required>
            </div>

            <div class="form-group">
                <label><i class="ti-lock"></i> Razorpay Key Secret</label>
                <input type="text" name="key_secret" value="<?php echo esc_attr($key_secret); ?>" required>
            </div>

            <div class="form-group">
                <label><i class="ti-cloud"></i> SureCart API Key</label>
                <input type="text" name="surecart_api_key" value="<?php echo esc_attr($surecart_api_key); ?>" required>
            </div>
        </form>
    </div>

    <style>
        .sc-razorpay-settings {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 20px 20px 0;
        }

        .sc-razorpay-settings header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #01824c;
            padding: 12px 20px;
            border-radius: 6px;
            color: #fff;
        }

        .sc-razorpay-settings .logo {
            display: flex;
            align-items: center;
        }

        .sc-razorpay-settings h1 {
            color: #ffffff;
            font-size: 20px;
            margin: 0;
        }

        #sc-razorpay-form {
            margin-top: 24px;
        }

        .sc-razorpay-settings .save-button {
            background: #fff;
            color: #01824c;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: 0.3s;
        }

        .sc-razorpay-settings .save-button:hover {
            background: #218838;
            color: #fff;
        }

        .sc-razorpay-settings .save-button i {
            margin-right: 6px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group i {
            margin-right: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/themify-icons/css/themify-icons.css">
<?php
}