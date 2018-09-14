<!--<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../Resource/css/W4.css">
<body>

<div class="w3-container w3-center">
    <h2>Per collegarti al <b>db Corso PHP</b><br>Clicca il seguente bottone</h2>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">Login</button>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-blue" style="max-width:600px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" 
              class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
              <img src="../../Resource/Immagini/logo_mysql.jpg" alt="Avatar" style="width:80%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="register.php" method="POST">
        <div class="w3-section" style="text-align:left!important">
            <label><b>Server</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Server" name="MYSQL_HOST" required>
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="MYSQL_USER" required>
          <label><b>Database</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Database" name="MYSQL_DB" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="MYSQL_PASSWORD" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Ricordami
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-gray">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Hai dimenticato la password?</a></span>
      </div>

    </div>
  </div>
</div>
            
</body>
</html>-->

<?php
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_DB", "corso_php");
define("MYSQL_PASSWORD", "root");

$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or
        die('Collegamento al DB non riuscito. Verifica i parametri di collegamento.');

if (mysqli_connect_errno()){
    echo 'Collegamento non riuscito al DB: ' . mysqli_connect_error();
    die();
}

?>