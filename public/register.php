<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = clean($_POST['name']);
    $email  = clean($_POST['email']);
    $pass   = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone  = clean($_POST['phone']);
    $type   = clean($_POST['business_type']);
    $goals  = clean($_POST['social_media_goals']);
    $token  = randomToken(20);

    $stmt = $pdo->prepare("INSERT INTO users
    (name,email,password,phone,business_type,social_media_goals,verify_token)
    VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$name,$email,$pass,$phone,$type,$goals,$token]);

    $link = "http://{$_SERVER['HTTP_HOST']}/public/verify.php?token=$token";
    sendMail($email, "Verify Your Email", "Click to verify: <a href='$link'>$link</a>");

    echo "<div class='alert alert-info'>Check your email to verify your account.</div>";
}

include __DIR__ . '/../includes/header.php';
?>
<form method="POST" class="w-50 mx-auto">
<h2>Sign Up</h2>
<input name="name" placeholder="Name" class="form-control mb-2" required>
<input name="email" type="email" placeholder="Email" class="form-control mb-2" required>
<input name="password" type="password" placeholder="Password" class="form-control mb-2" required>
<input name="phone" placeholder="Phone" class="form-control mb-2">
<select name="business_type" class="form-select mb-2">
<option selected disabled>Business Type</option>
<option>Retail</option><option>Services</option><option>Other</option>
</select>
<textarea name="social_media_goals" placeholder="Goals" class="form-control mb-3"></textarea>
<button class="btn btn-primary">Create Account</button>
</form>
<?php include __DIR__ . '/../includes/footer.php'; ?>
