<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';

$name = clean($_POST['name']);
$email = clean($_POST['email']);
$phone = clean($_POST['phone']);
$type = clean($_POST['business_type']);
$goals = clean($_POST['social_media_goals']);

$stmt = $pdo->prepare("INSERT INTO leads (name,email,phone,business_type,social_media_goals)
VALUES (?,?,?,?,?)");
$stmt->execute([$name,$email,$phone,$type,$goals]);

// Optionally notify admin
sendMail('admin@yourdomain.com','New Lead','Lead from '.$name);

redirect('index.php?thanks=1');
