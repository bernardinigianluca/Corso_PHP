<?php
session_start();
//verifica se l'utente ha fatto log-in con una password valida
if ($_SESSION['authuser'] != 1){
    echo 'Sorry, but you don\'t have permission to view this page!';
    exit();
}
?>
<html>
    <head>
        <title>My Movie Site - <?php echo $_GET['favmovie']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/My.css">
    </head>
    <body>
        <?php
        echo '<h1> Welcome to our site, ';
//        echo $_COOKIE['username'].'! <br/>';
        echo $_SESSION['username'].'! </h1><br/>';
//        define("FAVMOVIE", "The life of Brian");
        echo '<p>My favorite movie is ' . $_GET['favmovie'];
//        echo FAVMOVIE;
        echo '<br/>';
        $movierate = 5;
        echo 'My movie rating for this movie is: ' . $movierate . '</p>';
//        echo $movierate;
        ?> 
    </body>
</html>
