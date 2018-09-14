<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1){
    $shw_logged = 'enabled';
} else {
    $shw_logged = 'disabled';
}
$_SESSION['shw_logged']=$shw_logged;
?>
<html>
    <head>
        <title>Main page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/my_css.css"/>
    </head>
    <body>
        <div>
            <div class="my-header">Benvenuto nel mio sito!</div>
            <div class="my-menu">               
                <ul>
                    <a href="main.php" class="my-button-home" Title="Vai a Home">Home</a>
                    <?php
                     if ($shw_logged == 'enabled') {
                         ?>
                        <li><a href="logout.php">logout</a></li>
                        <li><span>|</span></li>
                        <li><a href="user_personal.php">Area personale</a></li>
                        <li><span>|</span></li>
                        <li><span><?php echo 'ciao, ' . $_SESSION['username']; ?></span></li>
                    <?php
                     } else {
                     ?>
                        <li><a href="register.php">Registrazione</a></li>
                        <li><span>|</span></li>
                        <li><a href="login.php">Accedi</a></li>
                    <?php
                     }
                    ?>                  
                </ul>
            </div>
        </div>
    </body>
</html>