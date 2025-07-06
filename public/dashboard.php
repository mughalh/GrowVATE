<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
if (!isLoggedIn()) redirect('login.php');

$userId = $_SESSION['user_id'];
// Fetch campaigns
$stmt = $pdo->prepare("SELECT * FROM campaigns WHERE user_id=?");
$stmt->execute([$userId]);
$campaigns = $stmt->fetchAll();

// Fetch user profile
$user = $pdo->prepare("SELECT * FROM users WHERE id=?");
$user->execute([$userId]);
$profile = $user->fetch();

include __DIR__ . '/../includes/header.php';
?>

<h2>Your Campaigns</h2>
<div class="row">
<?php foreach($campaigns as $c): ?>
<div class="col-md-4 mb-4">
<div class="card">
<div class="card-body">
<h5><?= $c['name'] ?></h5>
<div class="progress mb-2">
<div class="progress-bar" style="width:<?= $c['progress'] ?>%">
<?= $c['progress'] ?>%
</div>
</div>
<canvas id="chart-<?= $c['id'] ?>" height="150"></canvas>
</div>
</div>
</div>
<?php endforeach; ?>
</div>

<h2>Profile</h2>
<form method="POST" action="update_profile.php" class="w-50">
<input name="name" value="<?= $profile['name'] ?>" class="form-control mb-2">
<input name="phone" value="<?= $profile['phone'] ?>" class="form-control mb-2">
<button class="btn btn-primary">Update Profile</button>
</form>

<script>
// Render Chart.js for each campaign
document.addEventListener('DOMContentLoaded',()=>{
    <?php foreach($campaigns as $c):
    $metrics = json_encode(json_decode($c['metrics'],true) ?? ['likes'=>0,'comments'=>0,'shares'=>0]);
    ?>
    new Chart(document.getElementById('chart-<?= $c['id'] ?>').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Likes','Comments','Shares'],
            datasets: [{data: <?= $metrics ?>, backgroundColor:['#007bff','#28a745','#dc3545']}]
        }
    });
    <?php endforeach; ?>
});
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
