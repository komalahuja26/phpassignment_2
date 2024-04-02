<?php
include('shared/authorize.php');
include('shared/header.php');
require('db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = :username";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
$cmd->execute();
$users = $cmd->fetch();

if (empty($users)) {
    $db = null;
    header('location:login.php?valid=false');
    exit();
}
else {
    if (!password_verify($password, $users['password'])) {
        $db = null;
        header('location:login.php?valid=false');
        exit();
    }
    else {
        session_start();
        $_SESSION['username'] = $username;
        header('location:cuisinelist.php');
        exit();
    }
}
?>