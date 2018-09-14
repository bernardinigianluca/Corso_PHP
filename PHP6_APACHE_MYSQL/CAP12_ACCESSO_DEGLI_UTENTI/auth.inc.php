<?php
// avvia o continua la sessione
session_start();
//session_unset();
if (!isset($_SESSION['logged'])) {
    header('Refresh: 5; URL=login.php?redirect=' . $_SERVER['PHP_SELF']);
    echo '<p>Sarai reindirizzato a la pagina di login in 5 secondi.</p>';
    echo '<p>Se il vostro browser non se reindirizza automaticamente, '
    . '<a href="login.php?redirect=' . $_SERVER['PHP_SELF'] . '">Clicca qui</a>.</p>';
    die();
}

