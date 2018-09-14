
<?php
session_start();
include 'db.inc.php';

//$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or 
//        die('Collegamento non riuscito. Verifica i parametri di conessione.');

$hobbies_list = array('Computers','Dancing','Exercise','Flying','Golfing',
    'Hunting','Internet','Reading','Traveling','Other and listed');

$username = (isset($_POST['username']))? trim($_POST['username']):'';
$password = (isset($_POST['password']))? trim($_POST['password']):'';
$first_name = (isset($_POST['first_name']))? trim($_POST['first_name']):'';
$last_name = (isset($_POST['last_name']))? trim($_POST['last_name']):'';
$email = (isset($_POST['email']))? trim($_POST['email']):'';
$city = (isset($_POST['city']))? trim($_POST['city']):'';
$state = (isset($_POST['state']))? trim($_POST['state']):'';
$hobbies = (isset($_POST['hobbies']) && is_array($_POST['hobbies'])) ? $_POST['hobbies']:array();

if (isset($_POST['submit']) && $_POST['submit'] == 'Register') {
    
    $errors = array();
       
    // controlla se il nome utente è già registrato
    $query = 'Select username FROM site_user WHERE username = "' . $username . '"';
    $result = mysqli_query($db, $query) or die(mysqli_error());
    
    if (mysqli_num_rows($result)>0) {
        
        $errors[] = 'Username ' . $username . ' gia essistente.';
    }
    
    mysqli_free_result($result);
    
    if (count($errors)>0) {
        echo '<div id="msgbox_informazione" class="my-modal" style="display:none">';
        echo '<div class="my-modal-content my-shadow">';
        echo '<header class="my-container my-teal-color my-ali-left my-pad-16">';
        echo '<h3>Informazione!</h3>';
        echo '</header>';
        echo '<div class="my-container my-alg-left my-pad-16">'
            . '<p>Per favore, corregere il seguente errore:</p>';
        echo '<p><b>Username:</b> ' . $username . ' essistente.</p>';
        echo '</div>';
        echo '<footer class="my-teal-color my-alg-center-ori">';
        echo '<input type="button" name="ok" value="OK" '
                . 'onclick="Close_foco();"/>';
        echo '</footer>';
        echo '</div>';
        echo '</div>';
        ?>
        <script>
            document.getElementById('msgbox_informazione').style.display='block';
            function Close_foco(){
                document.getElementById('msgbox_informazione').style.display='none';
                document.getElementById('username').focus();
            }
        </script>
        <?php
    } else {
        // nessun errore, perciò inserisce le informazioni
        
        $query = 'INSERT INTO site_user'
                . '(user_id, username, password)'
                . 'VALUES'
                . '(NULL, "' . mysqli_real_escape_string($db,$username) . '",'
                . 'PASSWORD("' . mysqli_real_escape_string($db,$password) . '"))';
        
        $result = mysqli_query($db, $query) or die(mysqli_error());
        
        $user_id = mysqli_insert_id($db);
        
        $query = 'INSERT INTO site_user_info '
                . '(user_id, first_name, last_name, email, city, state, hobbies) '
                . 'VALUES '
                . '("' . $user_id . '", '
                . '"' . mysqli_real_escape_string($db,$first_name) . '", '
                . '"' . mysqli_real_escape_string($db,$last_name) . '", '
                . '"' . mysqli_real_escape_string($db,$email) . '", '
                . '"' . mysqli_real_escape_string($db,$city) . '", '
                . '"' . mysqli_real_escape_string($db,$state) . '", '
                . '"' . mysqli_real_escape_string($db,join(', ', $hobbies)) . '")';
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        
        $_SESSION['logged'] = 1;
        $_SESSION['username'] = $username;
        ?>

<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="css/my_css.css"/>
    </head>
    <body>
        <div id="msgbox_cancel" class="my-modal" style="display:block;">
            <div class="my-modal-content my-shadow">
                    <header class="my-container my-teal-color my-ali-left my-pad-16">
                      <h3>Informazione</h3>
                    </header>
                    <div class="my-container my-alg-left my-pad-16">
                        <p>Grazie <b><?php echo $username; ?></b> per la sua registrazione!</strong></p>
                    </div>
                    <footer class="my-teal-color my-alg-center-ori">
                        <input type="button" value="Ok" onclick="window.location.href='main.php';"/>
                    </footer>
             </div>
        </div> 
    </body>
</html>
<?php
//            $_SESSION['logged'] = 1;
            header("location: main.php");
            die();
    }
}
?>
<html>
    <head>
        <title>Register</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/my_css.css">
        <link type="text/javascript" href="../../Resource/JavaScript/MyFunction.js">
    </head>
    <body>
        <div>
            <div class="my-header">Benvenuto nel mio sito!</div>   
            <div class="my-menu">               
                <ul>
                    <a href="main.php" class="my-button-home" Title="Vai a Home">Home</a>
                    <?php
                    $shw_logged=$_SESSION['shw_logged'];
                     if ($shw_logged == 'enabled') {
                         $_SESSION['shw_logged']=$shw_logged;
                         ?>
                        <li><a href="logout.php">logout</a></li>
                        <li><span>|</span></li>
                        <li><a href="user_personal.php">Area personale</a></li>
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
        </div>
        <div class="my-conteiner">
            <h2>Registrazione</h2>
            <form name="frmRegistration" action="register.php" method="post" onsubmit="return validateForm()">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" size="20" maxlength="20" 
                       placeholder="Username..."  value="<?php echo $username; ?>" required autofocus/>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" size="20" maxlength="20" 
                           placeholder="Password..." value="<?php echo $password; ?>" required/>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" size="40" maxlength="40" 
                           placeholder="Email..." value="<?php echo $email; ?>" required/>
                <label for="first_name">First name:</label>
                <input type="text" name="first_name" id="first_name" size="20" maxlength="20" 
                           placeholder="First name..." value="<?php echo $first_name; ?>" required/>
                <label for="last_name">Last name:</label>
                <input type="text" name="last_name" id="last_name" size="20" maxlength="20" 
                           placeholder="Last name..." value="<?php echo $last_name; ?>" required/>
               <label for="city">City:</label>
                <input type="text" name="city" id="city" size="20" maxlength="20" 
                           placeholder="City..." value="<?php echo $city; ?>" required/>
                <label for="state">State:</label>
                <input type="text" name="state" id="state" size="2" maxlength="2" 
                           placeholder="State..." value="<?php echo $state; ?>" required/>
                <label for="hobbies">Hobbies/Interests:</label>
                <select name="hobbies[]" id="hobbies" multiple="multiple">
                <?php
                foreach ($hobbies_list as $hobby) 
                {
                    if (in_array($hobby, $hobbies)) {
                        echo '<option value="' . $hobby . '" selected="selected">' . $hobby . '</option>';
                    } else {
                        echo '<option value="' . $hobby . '">' . $hobby . '</option>';
                    }
                }
                ?>
                 </select>
                <div class="btn-center">
                    <input type="submit" name="submit" value="Register"/> &nbsp;
                    <input type="button" name="cancel" value="Cancel" onclick="window.location.href='main.php';"/>
                </div>
        </form>
     </div>
   </body>
</html>



