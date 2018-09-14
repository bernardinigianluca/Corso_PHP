<?php session_start(); ?>
<html>
    <head>
        <title>CMS</title>
        <style type="text/css">
            td { vertical-align: top; }
        </style>
    </head>
    <body>
        <h1>Apprezzamento del libro di fumetti</h1>
        <?php
        if (isset($_SESSION['name'])) {
        echo '<div id="logowelcome"><p>Sei attualmente connesso come: ' . $_SESSION['name'] . ' </p>';
        }
        ?>
        </div>
        <div id="navright">
            <form method="get" action="cms_search.php">
                <div>
<!--                    <label for="Ricerca">Ricerca</label>-->
                <?php
                    echo '<input type="search" id="search" name="search" placeholder="Cerca..."';
                    if (isset($_GET['keywords'])) {
                        echo ' value="' . htmlspecialchars($_GET['keywords']) . '" ';
                    }
                    echo '/>';
                ?>
                    <input type="submit" value="Search"/>
                </div>
            </form>
        </div>
        <div id='navigation'>
            <a href="cms_index.php">Articoli</a>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo ' | <a href="cms_compose.php">Comporre</a>';
                if ($_SESSION['access_level'] > 1) {
                    echo ' | <a href="cms_pending.php">Revisione</a>';
                }
                if ($_SESSION['access_level'] > 2) {
                    echo ' | <a href="cms_admin.php">Administrazione</a>';
                }
                echo ' | <a href="cms_cpanel.php">Pannello di Controllo</a>';
                echo ' | <a href="cms_transact_user.php?action=Logout">Logout</a>';
            } else {
                echo ' | <a href="cms_login.php">Login</a>';
            }
            ?>
        </div>
    <div id="articles">
