<?php
$title = 'list of cuisines';
include('shared/authorize.php');
include('shared/header.php');
include('db.php');

$sql = "SELECT * FROM cuisines";
$cmd = $db->prepare($sql);

$cmd->execute();
$food = $cmd->fetchAll();

echo '<h1>cuisines</h1>';
echo '<table><thead><th>food_id</th><th>food_name</th><th>food_type</th><th>food_photo</th>';
echo '</thead>';

foreach ($food as $foods) {
    echo '<tr>
        <td>' . $foods['food_id'] . '</td>
        <td>' . $foods['food_name'] . '</td>
        <td>' . $foods['food_type'] . '</td>
        <td>' . $foods['food_photo'] . '</td>';
        if (!empty($_SESSION['username'])) {
            echo '<td>
                <a href="edit-cuisine.php?food_id=' . $foods['food_id'] . '">
                    Edit
                </a>&nbsp;
                <a href="delete-cuisine.php?showId=' .$foods['food_id'] . '" onclick="return confirmDelete();">
                    Delete
                </a>
            </td>';
        }
        echo '</tr>';
}

echo '</table>';


$db = null;
?>
</main>
</body>
</html>
?>