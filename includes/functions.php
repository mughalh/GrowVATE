<?php
// includes/functions.php
session_start();

// Helper: redirect
function redirect($url) {
    header("Location: $url");
    exit;
}

// CSRF & SQL-injection safe input
function clean($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Generate random tokens
function randomToken($length = 50) {
    return bin2hex(random_bytes($length));
}

// Send email (requires mail server config)
function sendMail($to, $subject, $body) {
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    // From header
    $headers .= "From: no-reply@yourdomain.com\r\n";
    mail($to, $subject, $body, $headers);
}

// Check login
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Check admin
function isAdmin() {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}
