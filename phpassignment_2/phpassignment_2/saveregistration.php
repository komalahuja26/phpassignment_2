<?php
include('shared/authorize.php');
include('shared/header.php');
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;
if (empty($username)) {
    echo 'Username is required<br />';
    $ok = false;
}

if (strlen($password) < 8) {
    echo '8-Char Password is required<br />';
    $ok = false;
}

if ($password != $confirm) {
    echo 'Passwords must match<br />';
    $ok = false;
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

include('db.php');

// 4a. duplicate user check
$sql = "SELECT * FROM users WHERE username = :username";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();
$users = $cmd->fetchAll();

if (!empty($users)) {
    $db = null;
    header('location:register.php?duplicate=true');
    exit();
}

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->bindParam(':password', $passwordHash, PDO::PARAM_STR, 255);
$cmd->execute();


$db = null;


echo 'User Saved';


?>