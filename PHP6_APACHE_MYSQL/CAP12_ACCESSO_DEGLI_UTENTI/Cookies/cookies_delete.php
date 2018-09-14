<?php
// i cookie sono già scaduti
$expire =time() - 3600; //imposta la data di scadenza di un'ora fa

setcookie('username', null, $expire, '/');
setcookie('remember_me', null, $expire, '/');

header('Refresh: 5; URL=cookies_test.php');
?>
<html>
    <head>
        <title>Cookies Test (Delete)</title>
    </head>
    <body>
        <h1>Deleting Cookies</h1>
        <p>Sarai reindirizzato alla Main test in 5 secondi.</p>
        <p>Se non sei reindirizzato in 5 secondi. <a href="cookies_test.php">clicca qui</a>.</p></p>
    </body>
</html>
