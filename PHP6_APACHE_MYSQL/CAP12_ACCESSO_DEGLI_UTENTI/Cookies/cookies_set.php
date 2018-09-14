<?php
// i cookie possono scadere dopo 30 giorni
// il valore è espresso in secondi) 
$expire = time() + (60*60*24*30); //secondi minuti, ore, giorni

setcookie('username', 'test_user', $expire, '/'); // Il '/' disponibile in tutto il web site.
setcookie('remember_me', 'yes', $expire, '/');    // di naltra maniera sarà disponibile solo
header('Refresh: 5; URL=cookies_test.php');       // nell directory attuale.
?>
<html>
    <head>
        <title>Cookies Test (Set)</title>
    </head>
    <body>
        <h1>Setting Cookies</h1>
        <p>Sarai reindirizzato alla Main test in 5 secondi.</p>
        <p>Se non sei reindirizzato in 5 secondi. <a href="cookies_test.php">clicca qui</a>.</p>
    </body>
</html>