<?php
include './auth.inc.php';
include './db.inc.php';
$shw_logged = $_SESSION['shw_logged'];

if (isset($_POST['submit']) && $_POST['submit'] == 'Yes'){
    $query = 'DELETE i FROM '
            . 'site_user u JOIN site_user_info i ON u.user_id = i.user_id '
            . 'WHERE u.username="' . mysqli_real_escape_string($db,$_SESSION['username']) . '"';
    mysqli_query($db,$query) or die(mysqli_error($db));
    
    $query = 'DELETE FROM site_user WHERE username="' . mysqli_real_escape_string($db,$_SESSION['username']) . '"';
    mysqli_query($db,$query) or die(mysqli_error($db));
    $_SESSION['logged'] = null;
    $_SESSION['username'] = null;
?>
    <html>
        <head>
            <title>Cancellazione Account</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="css/my_css.css"/>
        </head>
        <body>
            <div class="my-header">Benvenuto nel mio sito!</div>   
            <div class="my-menu">              
              <ul>
                  <a href="main.php" class="my-button-home" Title="Vai a Home">Home</a>
                  <?php
                   if ($shw_logged == 'enabled') {
                       ?>
                      <li><a href="logout.php">logout</a></li>
          <!--            <li><span>|</span></li>
                      <li><a href="user_personal.php">Area personale</a></li>-->
                      <li><span>|</span></li>
                      <li><span><?php echo 'ciao, ' . $_SESSION['username']; ?></span></li>
                  <?php
                   } else {
                   ?>
                      <li><a href="register.php">Registrazione</a></li>
                      <li><span>|</span></li>
                      <li><a href="login.php">Accedi</a></li>
                  <?php
                   }
                  ?>                  
              </ul>
          </div>  
            <div id="msgbox_confermazione" class="my-modal" style="display:block;">
                <div class="my-modal-content my-shadow">
                    <header class="my-container my-teal-color my-ali-left my-pad-16">
                      <h3>Informazione!</h3>
                    </header>
                    <div class="my-container my-alg-left my-pad-16">
                        <p><b>Il tuo account è stato cancellato!</b></p>
                    </div>
                    <footer class="my-teal-color my-alg-center-ori">
                            <input type="button" name="ok" value="OK" 
                            onclick="window.location.href='main.php';"/>
<!--                                     document.getElementById('msgbox_confermazione').style.display='none'"/>-->
                    </footer>
                </div>
            </div> 
        </body>
    </html>
<?php
    mysqli_close($db);
    die();
} else {
 ?>
<html>
 <head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Personal Info</title>
  <link rel="stylesheet" type="text/css" href="css/my_css.css"/>
  </head>
 <body>
  <div class="my-header">Benvenuto nel mio sito!</div>   
  <div class="my-menu">              
    <ul>
        <a href="main.php" class="my-button-home" Title="Vai a Home">Home</a>
        <?php
         if ($shw_logged == 'enabled') {
             ?>
            <li><a href="logout.php">logout</a></li>
<!--            <li><span>|</span></li>
            <li><a href="user_personal.php">Area personale</a></li>-->
            <li><span>|</span></li>
            <li><span><?php echo 'ciao, ' . $_SESSION['username']; ?></span></li>
        <?php
         } else {
         ?>
            <li><a href="register.php">Registrazione</a></li>
            <li><span>|</span></li>
            <li><a href="login.php">Accedi</a></li>
        <?php
         }
        ?>                  
    </ul>
</div>  
    <?php
    $query = 'SELECT '
            . 'username, first_name, last_name, city, state, email, hobbies '
            . 'FROM '
            . 'site_user u JOIN '
            . 'site_user_info i ON u.user_id = i.user_id '
            . 'WHERE '
            . 'username = "' . mysqli_real_escape_string($db, $_SESSION['username']) . '"';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_array($result);
    extract($row);
    mysqli_free_result($result);
    mysqli_close($db);
    ?>
    <div class="my-conteiner">
    <h1>Informazione Personale</h1>
    <ul id="ul-inf-per">
        <li id="li-inf-per"><label>First name:</label> <?php echo $first_name; ?></li>
        <li id="li-inf-per"><label>Last name:</label> <?php echo $last_name; ?></li>
        <li id="li-inf-per"><label>City:</label> <?php echo $city; ?></li>
        <li id="li-inf-per"><label>State:</label> <?php echo $state; ?></li>
        <li id="li-inf-per"><label>Email:</label> <?php echo $email; ?></li>
        <li id="li-inf-per"><label>Hobbies/Interests:</label> <?php echo $hobbies; ?></li>
    </ul>
    <div class="btn-center" id="buttons">
        <input type="button" onclick="window.location.href='update_account.php'" value="Aggiorna account"/>
        <input type="button" onclick="document.getElementById('msgbox_cancel').style.display='block'" 
               value="Cancella account"/><br>
    </div>
    </div>

    <div id="msgbox_cancel" class="my-modal" >
        <div class="my-modal-content my-shadow">
                <header class="my-container my-teal-color my-ali-left my-pad-16">
                  <h3>Avvertenza!</h3>
                </header>
                <div class="my-container my-alg-left my-pad-16">
                    <p>Sei sicuro di cancellare il tuo account?</p><br>
                    <p><b>Non cì sarà nessuna maniera di ricuperare il tuo account una volta confermato!</b></p>
                </div>
                <footer class="my-teal-color my-alg-center-ori">
                    <form action="user_personal.php" method="post">
                        <input type="submit" name="submit" value="Yes" />
                        <input type="button" id="cancel" value="No" 
                        onclick="document.getElementById('msgbox_cancel').style.display='none'"/>
                    </form>
                </footer>
         </div>
    </div> 
   </body>
</html>
<?php
}
?>