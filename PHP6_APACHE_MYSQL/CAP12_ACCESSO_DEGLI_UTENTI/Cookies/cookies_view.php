<html>
    <head>
        <title>Cookies Test (View)</title>
    </head>
    <body>
        <h1>Cookies configurati</h1>
        <?php
            if (!empty($_COOKIE)) {
                echo '<h3>Cookies abilitati</h3>';
                echo '<pre>';
                    print_r($_COOKIE);
                echo '</pre>';
            } else {
                echo '<h3>Cookies disabilitati</h3>';
                echo '<p>Non c\'è cookies configurati</p>';
            }
            ?>
        <p><a href="cookies_test.php">Ritorna alla main test</a></p>
    </body>
</html>

