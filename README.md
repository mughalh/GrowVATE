# 🚀 GrowHive – Social Media Marketing & Lead Management Platform

GrowVATE is a modern, responsive, and user-friendly web service built with PHP, MySQL, HTML5, CSS3, and JavaScript. It helps businesses capture leads, manage social media campaigns, and track performance—all from a sleek, intuitive dashboard.

---

## 🌟 Features

### 🏠 Landing Page
- High-conversion hero section with CTA
- Lead capture form (Name, Email, Phone, Business Type, Goals)
- Clean, responsive design using Bootstrap 5

### 🔐 User Authentication
- Secure Sign-Up / Sign-In with password hashing
- Email verification and password reset
- Optional: Social login (Google, Facebook)

### 📊 Client Dashboard
- Campaign progress tracker (e.g., “Facebook Ads – 70% Complete”)
- Engagement analytics with Chart.js
- Profile management and support contact

### 🛠️ Admin Panel
- View and manage all client submissions
- Update campaign progress
- Export client data to CSV

---

## 🧰 Tech Stack

| Layer       | Technology                     |
|------------|---------------------------------|
| Frontend    | HTML5, CSS3, Bootstrap 5, JS   |
| Interactivity | Chart.js                     |
| Backend     | PHP 8+ (Vanilla or Laravel)    |
| Database    | MySQL                          |
| Security    | Password hashing, SQL injection prevention, HTTPS-ready |

---


Debug using xampp just paste to th htdocs folder. then in phpmyadmin import the sql after creating a new database named "marketing_platform"


## 📁 Project Structure
project-root/
├── config/
│   └── database.php
├── includes/
│   ├── functions.php
│   ├── header.php
│   └── footer.php
├── public/
│   ├── css/
│   │   └── styles.css
│   ├── js/
│   │   └── app.js
│   ├── index.php
│   ├── submit_lead.php
│   ├── register.php
│   ├── verify.php
│   ├── login.php
│   ├── reset_request.php
│   ├── reset_password.php
│   ├── dashboard.php
│   ├── admin.php
│   ├── update_campaign.php
│   ├── export.php
│   └── logout.php
└── sql/
    └── schema.sql


