<?php
include('shared/authorize.php');
include('shared/header.php');
$food_id = $_GET['food_id'];
$food_name = null;
$food_type = null;
$food_photo = null;

if(is_numeric($food_id)){
        include('db.php');
        $sql = "SELECT * FROM cuisines WHERE food_id = :food_id";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':food_id', $food_id, PDO::PARAM_INT);
        $cmd->execute();
        $cuisines = $cmd->fetch();

        
        $food_id = $cuisines['food_id'];
        $food_name = $cuisines['food_name'];
        $food_type = $cuisines['food_type'];
        $food_photo = $cuisines['food_photo'];   
    }
?>
<form method="post" action="update-cuisine.php" enctype="multipart/form-data">
    <fieldset>
        <label for="food_id">Food_id: </label>
        <input name="food_id" id="food_id" required value="<?php echo $food_id; ?>" />

        <label for="food_name">Food_name: </label>
        <input name="food_name" id="food_name" required value="<?php echo $food_name; ?>" />

        <label for="food_type">Food_type: </label>
        <input name="food_type" id="food_type" required value="<?php echo $food_type; ?>" />
    </fieldset>
    <fieldset>
        <label for="food_photo">Food_photo: </label>
        <input type="file" id="food_photo" name="food_photo" accept="image/*" />
        <input type="hidden" id="currentPhoto" name="currentPhoto" value="<?php echo $food_photo; ?>" />
        <?php
        if ($food_photo != null) {
            echo '<img src="img/uploads' . $food_photo . '" alt="Photo" />';
        }
        ?>
    </fieldset>
    <button>Submit</button>
</form>
</main>
</body>
</html>