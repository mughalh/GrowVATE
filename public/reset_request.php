<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = clean($_POST['email']);
    $token = randomToken(20);
    $pdo->prepare("UPDATE users SET reset_token=? WHERE email=?")
    ->execute([$token,$email]);
    $link = "http://{$_SERVER['HTTP_HOST']}/public/reset_password.php?token=$token";
    sendMail($email,"Password Reset","Reset here: <a href='$link'>$link</a>");
    echo "<div class='alert alert-info'>Check email for reset link.</div>";
}

include __DIR__ . '/../includes/header.php';
?>
<form method="POST" class="w-25 mx-auto">
<h2>Reset Password</h2>
<input name="email" type="email" placeholder="Email" class="form-control mb-3" required>
<button class="btn btn-warning w-100">Send Reset Link</button>
</form>
<?php include __DIR__ . '/../includes/footer.php'; ?>
