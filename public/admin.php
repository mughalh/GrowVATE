<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
if (!isLoggedIn() || !isAdmin()) redirect('login.php');

// Fetch leads, users, campaigns
$leads = $pdo->query("SELECT * FROM leads ORDER BY created_at DESC")->fetchAll();
$users = $pdo->query("SELECT * FROM users ORDER BY created_at DESC")->fetchAll();
$campaigns = $pdo->query("SELECT c.*,u.name FROM campaigns c JOIN users u ON c.user_id=u.id")->fetchAll();

include __DIR__ . '/../includes/header.php';
?>
<h2>All Leads</h2>
<table class="table table-striped">
<thead><tr><th>Name</th><th>Email</th><th>Submitted</th></tr></thead>
<tbody>
<?php foreach($leads as $l): ?>
<tr>
<td><?= $l['name'] ?></td>
<td><?= $l['email'] ?></td>
<td><?= $l['created_at'] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<h2>User Campaigns</h2>
<table class="table table-hover">
<thead><tr><th>User</th><th>Campaign</th><th>Progress</th><th>Action</th></tr></thead>
<tbody>
<?php foreach($campaigns as $c): ?>
<tr>
<td><?= $c['name'] ?></td>
<td><?= $c['name'] ?></td>
<td><?= $c['progress'] ?>%</td>
<td><a href="update_campaign.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-primary">Update</a></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<a href="export.php" class="btn btn-success">Export Clients CSV</a>
<?php include __DIR__ . '/../includes/footer.php'; ?>
