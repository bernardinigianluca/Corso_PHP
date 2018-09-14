<?php
    function redirect($url) {
        if (!headers_sent()) {
            header('Location: ' . $url);
        } else {
            die("Impossibile reindirizzare; L'output è già stato inviato al browser.");
        }
    }
?>