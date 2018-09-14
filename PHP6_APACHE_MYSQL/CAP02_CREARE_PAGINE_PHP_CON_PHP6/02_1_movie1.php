<?php
//setcookie('username','Joe', time() + 60);
session_start();
$_SESSION['username']= $_POST['user'];
$_SESSION['userpass']= $_POST['pass'];
$_SESSION['authuser']= 0;

//verifica le informazione relative a password e username
if (($_SESSION['username'] == 'Joe') and ($_SESSION['userpass'] == '12345')){
    $_SESSION['authuser'] = 1;
    $Title = "My favorite movie!";
} else {
    echo '<head><title>Permission denied</title>';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="stylesheet" href="../CSS/My.css"</head>';
    echo '<p>Sorry, but you don\'t have permission to view this page!</p>';
    exit();
}
?>
    <html>
    <head>
        <title> <?php echo $Title; ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/My.css">
    </head>
    <body>
        <?php
        $myfavmovie = "Life of Brian";
        ?>
        <p><a href="02_moviesite.php? <?php echo "favmovie=$myfavmovie" ?>">
        Click here to see information about my favorite movie!</a></p>
        
    </body>
</html>