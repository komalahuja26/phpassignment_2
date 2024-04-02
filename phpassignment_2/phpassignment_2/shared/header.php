<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
              session_start();
            }  
        ?>
        <nav>
            <ul>
                <li>
                <a href="index.php">home</a>
                </li>
            </ul>
            <?php
            if (!empty($_SESSION["username"]))
            {
                echo'
                <ul>
                    <li>
                        <a href="cuisinelist.php">cuisinelist</a>
                    </li>
                </ul>';
            }
            ?>
             <?php
            if (!empty($_SESSION["username"]))
            {
                echo'
                <ul>
                    <li>
                    <a href="add-cuisines.php">add-cuisines</a>
                    </li>
                </ul>';
            }
            ?>
           
            <ul>
                <li>
                    <a href="login.php">login</a>
                </li>
            </ul>
            <ul>
                    <li>
                    <a href="register.php">create account</a>
                    </li>
                </ul>';
            <?php
            if (!empty($_SESSION["username"]))
            {
                echo'
                <ul>
                    <li>
                    <a href="logout.php">logout</a>
                    </li>
                </ul>';
            }
           ?>
            <ul>
                <?php
                if (!empty($_SESSION['username']))
                 {
                echo '
                <li>
                    <a>' . $_SESSION['username'] . '</a>
                </li>';
                }
                ?>
            </ul>
        </nav>
        <h1>Indian Cuisines</h1>
    </header>