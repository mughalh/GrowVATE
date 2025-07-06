<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = clean($_POST['email']);
    $pass  = $_POST['password'];
    $stmt  = $pdo->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user  = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        if (!$user['is_verified']) {
            echo "<div class='alert alert-warning'>Verify your email first.</div>";
        } else {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['is_admin'] = ($email === 'admin@yourdomain.com');
            redirect('dashboard.php');
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid credentials.</div>";
    }
}

include __DIR__ . '/../includes/header.php';
?>
<form method="POST" class="w-25 mx-auto">
<h2>Sign In</h2>
<input name="email" type="email" placeholder="Email" class="form-control mb-2" required>
<input name="password" type="password" placeholder="Password" class="form-control mb-3" required>
<button class="btn btn-primary w-100">Login</button>
<a href="reset_request.php" class="small d-block mt-2">Forgot Password?</a>
</form>
<?php include __DIR__ . '/../includes/footer.php'; ?>
