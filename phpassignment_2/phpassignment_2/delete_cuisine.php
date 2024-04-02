<?php
include('shared/authorize.php');
include('shared/header.php');

$food_id = $_GET['food_id'];

require('db.php');

$sql = "DELETE FROM cuisines WHERE food_id = :food_id";
$cmd = $db->prepare($sql);
$cmd->bindParam(':food_id', $food_id, PDO::PARAM_INT);

$cmd->execute();

$db = null;
echo 'record deleted';
?>