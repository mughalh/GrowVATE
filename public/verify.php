<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $stmt = $pdo->prepare("UPDATE users SET is_verified=1, verify_token=NULL WHERE verify_token=?");
    $stmt->execute([$token]);
    echo "<div class='alert alert-success text-center'>Email verified! <a href='login.php'>Sign In</a></div>";
}
