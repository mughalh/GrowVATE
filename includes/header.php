<?php
// includes/header.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Marketing Platform</title>
<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
<a class="navbar-brand" href="index.php">GrowBiz</a>
<div>
<?php if(isLoggedIn()): ?>
<a href="dashboard.php" class="btn btn-outline-primary me-2">Dashboard</a>
<?php if(isAdmin()): ?>
<a href="admin.php" class="btn btn-outline-secondary me-2">Admin</a>
<?php endif; ?>
<a href="logout.php" class="btn btn-danger">Logout</a>
<?php else: ?>
<a href="login.php" class="btn btn-outline-primary me-2">Sign In</a>
<a href="register.php" class="btn btn-primary">Sign Up</a>
<?php endif; ?>
</div>
</div>
</nav>
<div class="container py-5">
