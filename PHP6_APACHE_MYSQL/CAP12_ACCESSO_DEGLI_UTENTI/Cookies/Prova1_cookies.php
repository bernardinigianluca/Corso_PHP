<?php
if (1){
    
}
?>

<!doctype html>
<html>
    <head>
        <title>A website</title>
        <link rel="stylesheet" href="global.css" />
    </head>
    <body>
        
        <?php
        if (!isset($_COOKIE['accept-cookies'])) {
        ?>
        <div class="cookie-banner">
            <div class="container">
                <p>Si usano cookies in questo website. Al usar este sito, consenti
                    los <a href="/cookies">cookies.</a></p>
                <a href="?accept-cookies" class="button">Ok, continua</a>
            </div>
        </div>
        <?php
        }
        ?>
        
        <p>Questa è una prova di messagio o banner dei cookie.</p>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script src="global.js"></script>
    </body>
</html>

