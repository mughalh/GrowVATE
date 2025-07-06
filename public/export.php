<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
if (!isLoggedIn() || !isAdmin()) redirect('login.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="clients.csv"');

$out = fopen('php://output','w');
fputcsv($out, ['Name','Email','Business Type','Goals','Registered','Created']);

$data = $pdo->query("SELECT name,email,business_type,social_media_goals,is_verified,created_at FROM users")->fetchAll();
foreach($data as $row){
    $row['is_verified'] = $row['is_verified'] ? 'Yes' : 'No';
    fputcsv($out, $row);
}
fclose($out);
