<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

if (isset($_GET['token']) && $_SERVER['REQUEST_METHOD']==='GET') {
    $token = $_GET['token'];
    include __DIR__ . '/../includes/header.php';
    echo "
    <form method='POST' class='w-25 mx-auto'>
    <h2>New Password</h2>
    <input type='hidden' name='token' value='$token'>
    <input name='password' type='password' placeholder='Password' class='form-control mb-3' required>
    <button class='btn btn-success w-100'>Update Password</button>
    </form>";
    include __DIR__ . '/../includes/footer.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $pass  = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token = $_POST['token'];
    $stmt  = $pdo->prepare("UPDATE users SET password=?, reset_token=NULL WHERE reset_token=?");
    $stmt->execute([$pass,$token]);
    echo "<div class='alert alert-success text-center'>Password updated. <a href='login.php'>Login</a></div>";
}
