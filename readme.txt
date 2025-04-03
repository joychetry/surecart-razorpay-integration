=== SureCart Razorpay Integration ===
Contributors: YourName  
Tags: surecart, razorpay, payments, integration, webhook  
Requires at least: 5.6  
Tested up to: 6.5  
Requires PHP: 7.4  
Stable tag: 1.0  
License: GPLv3 or later  
License URI: https://www.gnu.org/licenses/gpl-3.0.html  

== Description ==  
This plugin integrates **SureCart** with **Razorpay** for seamless online payments. It enables:  

✔️ Automatic order creation in Razorpay when an order is placed in SureCart  
✔️ Redirection to Razorpay checkout for payment processing  
✔️ Webhook support to update SureCart orders based on Razorpay payment status  
✔️ Automatic refunds when processed in Razorpay  

== Installation ==  
1. Upload the plugin folder to `/wp-content/plugins/`  
2. Activate it from **WordPress Dashboard → Plugins**  
3. Navigate to **Settings → SC Razorpay** and enter your Razorpay & SureCart API keys  
4. Ensure your Razorpay webhooks are configured to notify `https://yourwebsite.com/wp-json/surecart-razorpay/v1/razorpay-webhook/`  

== Frequently Asked Questions ==  

= What happens if a payment fails? =  
If a payment fails, the order status in **SureCart** is updated to **canceled**.  

= Does it support refunds? =  
Yes, when a refund is processed in **Razorpay**, the order in **SureCart** is automatically updated as refunded.  

= Can I use this with Razorpay Subscriptions? =  
Not yet, but future updates will include subscription handling.  

== Changelog ==  

= 1.0 (2025-03-30) =  
* Initial release with order sync, payments, and refunds.  

== License ==  
This plugin is released under the **GPLv2** license.  