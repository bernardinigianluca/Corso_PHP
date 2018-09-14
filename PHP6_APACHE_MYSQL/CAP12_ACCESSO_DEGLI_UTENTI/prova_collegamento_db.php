<?php
$a = 'localhost';
$b = 'root';
$c = 'genesi11';
$d = 'corso_php';

$db = mysqli_connect($a,$b,$c) or die("Collegamento non riuscito");
mysqli_select_db($db, $d);
echo 'Collegamento riuscito<br>';
//$query = "DROP TABLE SITE_USER";
//mysqli_query($db,$query) or die(mysqli_error($db));
//echo "Drop site_user table<br>'";
//$query = "DROP TABLE SITE_USER_INFO";
//mysqli_query($db,$query) or die(mysqli_error($db));
//echo 'Drop site_user_info';
?>
<html>
    <head>
        <title>Prove</title>
        <link rel="stylesheet" href="../../Resource/CSS/W4.css">
    </head>
    <button class="w3-button" onclick="document.getElementById('id01').style.display='block'">Accedi</button>
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom"
             style="max-width:400px;background-color: #CE003E; display:block;">
            <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" 
              class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
    </div>
            <div class="w3-center"><strong style="color:white;">Registrazione non autorizata.</strong></div>
            <div><p>Per favore, corregere i seguienti errori:</p></div>
            <ul>
                <li>First name non puo essere vuoto</li>
                <li>Last name non puo essere vuoto</li>
            </ul>
        </div>
    </div>
</html>
