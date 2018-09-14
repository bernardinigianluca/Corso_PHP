<?php
include './auth.inc.php';
include './db.inc.php';
$shw_logged = $_SESSION['shw_logged'];

$hobbies_list = array('Computers', 'Dancing', 'Exercise', 'Flying', 'Golfing', 
                        'Hunting','Internet', 'Reading', 'Traveling', 'Other than listed');

if (isset($_POST['submit']) && $_POST['submit'] === 'Update') {
    // filtra i valori in arrivo
    $username = (isset($_POST['username'])) ? trim($_POST['username']):'';
    $user_id = (isset($_POST['user_id'])) ? trim($_POST['user_id']):'';
    $first_name = (isset($_POST['first_name'])) ? trim($_POST['first_name']):'';
    $last_name = (isset($_POST['last_name'])) ? trim($_POST['last_name']):'';
    $email = (isset($_POST['email'])) ? trim($_POST['email']):'';
    $city = (isset($_POST['city'])) ? trim($_POST['city']):'';
    $state = (isset($_POST['state'])) ? trim($_POST['state']):'';
    $hobbies = (isset($_POST['hobbies']) && is_array($_POST['hobbies'])) ? $_POST['hobbies']:array();
 
    $errors = array();
    
    // verifica la validità della coppia nome utente user_id
    // (qualcuno potrebbe tentare di manipolare il 
    // form per simulare l'account di un'altra persona)
    
    $query = 'SELECT username FROM site_user WHERE '
            . 'user_id = "' . (int)$user_id . 
            '" AND username = "' . mysqli_real_escape_string($db, $_SESSION['username']) . '"';
    //1
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    
    if (mysqli_num_rows($result) == 0){
?>
<html>
    <head>
        <title>Informazione sul'aggiornamento del account</title>
        <link rel="stylesheet" type="text/css" href="my_css.css"/>
    </head>
    <body>
        <div>Non cercare di hackeare il software!</div>
    </body>
</html>
<?php
    mysqli_free_result($result);
    mysqli_close_db($db);
    die();
    }
    
    // se la persona è reale.
    
    mysqli_free_result($result);
    
    if (empty($first_name)) {
        $errors[] = 'First name non puo essere vuoto.';
    }
    if (empty($last_name)) {
        $errors[] = 'Last name non puo essere vuoto.';
    }
    if (empty($email)) {
        $errors[] = 'Email address non puo essere vuoto.';
    }
    if (count($errors)>0){
        echo "<div>Impossibile aggiornare le informazioni dell'account</div>";
        echo "<p>Correggi cuanto segue:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo '<li>'. $error . '</li>';
        }
        echo '</ul>';
    } else {
    // nessun errore, perciò le informazioni sono inserite nel database
        $query = 'UPDATE site_user_info SET '
                . 'first_name = "' . mysqli_real_escape_string($db, $first_name) . '", '
                . 'last_name = "' . mysqli_real_escape_string($db, $last_name) . '", '
                . 'email = "' . mysqli_real_escape_string($db, $email) . '", '
                . 'city = "' . mysqli_real_escape_string($db, $city) . '", '
                . 'state = "' . mysqli_real_escape_string($db, $state) . '", '
                . 'hobbies = "' . mysqli_real_escape_string($db,join(', ', $hobbies)) . '"'
                . 'WHERE user_id = ' . $user_id;
        mysqli_query($db, $query) or die(mysqli_error($db));
        mysqli_close($db);
//2
?>
<html>
    <head>
        <title>Aggiornamento del account</title>
        <link rel="stylesheet" type="text/css" href="css/my_css.css"/>
    </head>
    <body>
        <div class="my-header">Benvenuto nel mio sito!</div>
        <div id="msgbox_informazione" class="my-modal" style="display:block;">
            <div class="my-modal-content my-shadow">
                    <header class="my-container my-teal-color my-ali-left my-pad-16">
                      <h3>Informazione</h3>
                    </header>
                    <div class="my-container my-alg-left my-pad-16">
                      <p><b>Le informazioni sul tuo account sono state aggiornate!</b></p>
                    </div>
                    <footer class="my-teal-color my-alg-center-ori">
                        <input type="button" value="Ok" onclick="window.location.href='user_personal.php';"/>
                    </footer>
             </div>
        </div> 
    </body>
</html>
<?php
    die();
    }
} else {
    $query = 'SELECT u.user_id, first_name, last_name, email, city, state, hobbies as my_hobbies '
            . 'FROM '
            . 'site_user u JOIN site_user_info i ON u.user_id = i.user_id '
            . 'WHERE username = "' . mysqli_real_escape_string($db, $_SESSION['username']) . '"';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    $row = mysqli_fetch_assoc($result);
    extract($row);
    $hobbies = explode(', ', $my_hobbies);
    mysqli_free_result($result);
    mysqli_close($db);
}
// 3
?>
<html>
      <head>
          <title>Informazione sul'aggiornamento del account</title>
          <link rel="stylesheet" type="text/css" href="css/my_css.css"/>
            <script type='text/javascript'>
                window.onload() = function(){
                    document.getElementById('cancel').onclick = goBack;
                }
                function goBack(){
                    window.history.go(-1);
                }
            </script>
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
        <div class="my-conteiner">
        <h2>Informazione del Account</h2>
          <form action='update_account.php' method='post'>
            <label for='Username'>Username:</label>
            <input type='text' name='username' 
                   value='<?php echo $_SESSION['username']; ?>' disabled='disabled'/>
            <label for='email'>Email:</label>
            <input type='text' name='email' id='email' size='20' maxlength='50' 
                   value='<?php echo $email; ?>' required autofocus/>
            <label for='first_name'>First name:</label>
            <input type='text' name='first_name' id='first_name' size='20' maxlength='20' 
                   value='<?php echo $first_name; ?>' required />
            <label for='last_name'>Last name:</label>
            <input type='text' name='last_name' id='last_name' size='20' maxlength='20' 
                   value='<?php echo $last_name; ?>' required />
            <label for='city'>City:</label>
            <input type='text' name='city' id='city' size='20' maxlength='20' 
                   value='<?php echo $city; ?>' required />
            <label for='state'>State:</label>
            <input type='text' name='state' id='state' size='20' maxlength='20' 
                   value='<?php echo $state; ?>' required />
            <label for='hobbies'>Hobbies/Interests:</label>
                    <select name='hobbies[]' id='hobbies' multiple='multiple'>
                <?php
                foreach ($hobbies_list as $hobby){
                    if (in_array($hobby, $hobbies)){
                        echo '<option value="' . $hobby . '" selected="selected">' . $hobby . '</option>';
                    } else {
                        echo '<option value"' . $hobby . '">' . $hobby . '</option>';
                    }
                }
                ?>
                      </select>
            <div class="btn-center">
              <input type='hidden' name='user_id' value='<?php echo $user_id; ?>'/>
              <input type='submit' name='submit' value='Update'/>&nbsp;
              <input type='button' id='cancel' value='Cancel' onclick="window.history.go(-1);"/>
            </div>
          </form>
        </div>
      </body>
</html>