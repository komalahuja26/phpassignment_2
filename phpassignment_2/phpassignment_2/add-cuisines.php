<?php
include('shared/authorize.php');
include('shared/header.php');

?>

<form method="post" action="database_cuisine.php" enctype="multipart/form-data">
    <fieldset>
        <legend>Adding cuisines </legend>
        <label for="food_id">Food_id</label>
        <input type="number"  name="food_id" id="food_id" required>
        <label for="food_name">Food_name</label>
        <input type="text"  name="food_name" id="food_name" required>
        <label for="food_type">Food_type</label>
        <input type="text"  name="food_type" id="food_type" required>
        <label for="food_photo">Food_photo</label>
        <input type="file"  name="food_photo" id="food_photo" required>
    </fieldset>
    <button type="submit">Save</button>
</form>
</main>
</body>
</html>
