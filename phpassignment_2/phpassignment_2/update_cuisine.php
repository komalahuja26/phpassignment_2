<?php
include('shared/authorize.php');
include('shared/header.php');
$food_id = $_POST['food_id'];
$food_name = $_POST['food_name'];
$food_type = $_POST['food_type'];
$x = true;

if (empty($food_id)){
    echo 'foodID is required';
    $x = false;
}
if (empty($food_name)){
    echo 'food_name is required';
    $x = false;
}

if (empty($food_type)){
    echo 'food_type is required';
    $x = false;
}
if ($_FILES['photo']['size'] > 0) { 
    $photoName = $_FILES['photo']['name'];
    $pName = session_id() . '-' . $photoName;
     $size = $_FILES['photo']['size']; 
    $tmp_name = $_FILES['photo']['tmp_name'];
     $type = mime_content_type($tmp_name);

    if ($type != 'image/jpeg' && $type != 'image/png') 
         {
        echo 'Photo must be a .jpg or .png';
        exit();
         }
    else {
        move_uploaded_file($tmp_name, 'img/uploads' . $pName);
    }
}
if ($x = true){
    try {
        include ('db.php');
        $sql = "UPDATE FROM cuisines SET food_name=:food_name, food_type=:food_type, food_photo=:food_photo WHERE food_id=:food_id";

        $cmd = $db->prepare($sql);


        $cmd->bindParam(':food_id', $food_id, PDO::PARAM_INT);


        $cmd->bindParam(':food_name', $food_name, PDO::PARAM_STR);


        $cmd->bindParam(':food_type', $food_type, PDO::PARAM_STR);

        
        $cmd->bindParam(':photo', $pName, PDO::PARAM_STR);

        $cmd->execute();

        $db = null;

        echo ' update has been made';
    }
    catch (Exception $err) {
        header('location:error.php');
        exit();
    }
}

?>
