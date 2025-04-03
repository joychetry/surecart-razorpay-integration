# SureCart Razorpay Integration

🚀 **SureCart Razorpay Integration** is a WordPress plugin that enables seamless **Razorpay** payment gateway integration with **SureCart** using webhooks.

[![WordPress](https://img.shields.io/badge/WordPress-Compatible-blue)](https://wordpress.org/)
[![Razorpay](https://img.shields.io/badge/Razorpay-Integration-green)](https://razorpay.com/)
[![SureCart](https://img.shields.io/badge/SureCart-Supported-orange)](https://surecart.com/)

---

## 📥 **Installation**

### **1️⃣ Download & Upload**
1. Download the plugin from the **GitHub Repository**:  
   👉 **[SureCart Razorpay Plugin](https://github.com/joychetry/surecart-razorpay-integration)**
2. Upload the plugin to WordPress:  
   - Go to **WordPress Dashboard → Plugins → Add New → Upload Plugin**  
   - Select the ZIP file and click **Install Now**  
   - Click **Activate**

### **2️⃣ Setup Razorpay API Keys**
1. Log in to **[Razorpay Dashboard](https://dashboard.razorpay.com/)**  
2. Navigate to **Settings → API Keys**  
3. Generate and copy:
   - ✅ **Key ID**
   - ✅ **Key Secret**
4. In **WordPress Dashboard → SC Razorpay Settings**, enter these keys and save.

### **3️⃣ Configure Webhooks**
1. In **Razorpay Dashboard**, go to **Settings → Webhooks**  
2. Click **Add Webhook**  
3. Enter this Webhook URL: https://yourwebsite.com/wp-json/surecart-razorpay/v1/razorpay-webhook/
4. Select these Webhook Events:  
- ✅ `payment.authorized`  
- ✅ `payment.failed`  
- ✅ `order.paid`  
- ✅ `refund.processed`  
5. Click **Save Webhook**

### **4️⃣ Connect SureCart**
1. Go to **SC Razorpay Settings** in WordPress  
2. Enter your **SureCart API Key** (found in **SureCart Dashboard → API Keys**)  
3. Save the settings ✅

---

## 🎯 **Features**
✅ **Secure Razorpay Payments** in SureCart  
✅ **Real-time Order Updates** using Webhooks  
✅ **Handles Failed Payments & Refunds** Automatically  
✅ **User-friendly UI** with **Themify Icons**  
✅ **No Coding Required** – Just Configure & Use  

---

## 📌 **Testing the Integration**
1. **Enable Test Mode** in **Razorpay Dashboard**  
2. **Create a test order** in SureCart & pay via Razorpay  
3. **Verify order status** updates in WordPress  
4. **Try a failed payment** & check if it updates correctly  
5. **Process a refund** in Razorpay & confirm it reflects in SureCart  

---

## 🛠 **Support & Contributions**
💡 **Found an issue?** Open a [GitHub Issue](https://github.com/joychetry/surecart-razorpay-integration/issues)  
🤝 **Want to contribute?** Fork the repo & submit a **Pull Request**  

---

## 🔗 **Links & Resources**
- **SureCart API Docs**: [https://docs.surecart.com/](https://docs.surecart.com/)  
- **Razorpay API Docs**: [https://razorpay.com/docs/](https://razorpay.com/docs/)  
- **WordPress Plugin Guide**: [https://developer.wordpress.org/plugins/](https://developer.wordpress.org/plugins/)  

---

### **📜 License**
This plugin is licensed under the **MIT License**.  

---

🚀 **Built with ❤️ by [Joy Chetry](https://github.com/joychetry/)**  