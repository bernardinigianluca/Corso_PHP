<?php
session_start();

include 'db.inc.php';

//filtra i valori in arrivo
$username = (isset($_POST['username'])) ? trim($_POST['username']):'';
$password = (isset($_POST['password'])) ? trim($_POST['password']):'';
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'main.php';

if(isset($_POST['submit'])) {
    $query = 'SELECT username FROM site_user WHERE '
            . 'username = "' . mysqli_real_escape_string($db, $username) .'"'
            . ' AND ' . 'password = PASSWORD("' . mysqli_real_escape_string($db, $password) . '")';
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    if (mysqli_num_rows($result)> 0) {
        $_SESSION['username'] = $username;
            $_SESSION['logged'] = 1;
            header("location: main.php");
            die();
        } else {        
            $error = '<div id="msgbox_information" class="my-modal" style="display:block;">'
                    . '<div class="my-modal-content my-shadow">'
                    . '<header class="my-container my-teal-color my-ali-left my-pad-16">'
                    . '<span onclick="document.getElementById(\'msgbox_information\').style.display=\'none\'" '
                    . 'class="my-btn my-display-topright">&times;</span>'
                    . '<h3>Dati errati</h3>'
                    . '</header>'
                    . '<div class="my-container my-alg-center-ori my-pad-16">'
                    . '<p>Hai usato un <b>USERNAME</b> o <b>PASSWORD</b> invalido!</p>'
                    . '</div>'
                    . '<footer class="my-teal-color my-alg-center-ori">'
                    . '<p>Per favore <a href="register.php">clicca qui per registrarti</a>'
                    . ' se non l\'hai già fatto.</p>'
                    . '</footer>'
                    . '</div>'
                    . '</div>'
                    . '</div>';
        }
    }
?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/my_css.css"/>
<!--        <link rel="stylesheet" type="text/css" href="../../Resource/css/W4.css"/>-->
    </head>
    <body>
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
        <?php
        if (isset($error)){
            echo $error;
        }
        ?>
        <div class="my-conteiner">
            <form action="login.php" method="post">
                <h1>Login</h1>
                <label>Username:</label>
                <input type="text" name="username" size="20" maxlength="20"
                       placeholder="Username..." value="<?php echo $username; ?>" autofocus autocomplete required/>
                <label>Password:</label>   
                <input type="password" name="password" size="20" maxlength="20"
                       placeholder="Password..." value="<?php echo $password; ?>" required/>
                <div class="btn-center">
                <input style="display: none!important" name="redirect" value="<?php echo $redirect?>"/>
                <input type="submit" name="submit" value="login"/> &nbsp;
                <input type="button" name="cancel" value="Cancel" onclick="window.location.href='main.php';" />
                </div>
            </form>
            </div>
    </body> 
</html>