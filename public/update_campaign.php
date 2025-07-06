<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
if (!isLoggedIn() || !isAdmin()) redirect('login.php');

if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $c  = $pdo->prepare("SELECT * FROM campaigns WHERE id=?");
    $c->execute([$id]);
    $camp = $c->fetch();
    include __DIR__ . '/../includes/header.php';
    echo "
    <form method='POST' class='w-25 mx-auto'>
    <h2>Update Progress</h2>
    <input type='hidden' name='id' value='$id'>
    <input name='progress' type='number' min='0' max='100' value='{$camp['progress']}' class='form-control mb-2'>
    <button class='btn btn-primary'>Save</button>
    </form>";
    include __DIR__ . '/../includes/footer.php';
    exit;
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $id       = (int)$_POST['id'];
    $progress = (int)$_POST['progress'];
    $pdo->prepare("UPDATE campaigns SET progress=? WHERE id=?")->execute([$progress,$id]);
    redirect('admin.php');
}
