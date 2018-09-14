<?php
require_once '../CAP12_ACCESSO_DEGLI_UTENTI/db.inc.php';
require_once 'cms_http_functions.inc.php';

if (isset($_REQUEST['action'])) {
    
    switch ($_REQUEST['action']) {
    case 'Login':
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $password = (isset($_POST['password'])) ? $_POST['password'] : '';
        $sql = 'SELECT '
                . 'user_id, access_level, name '
                . 'FROM '
                . 'cms_users '
                . 'WHERE '
                . 'email = "' . mysqli_real_escape_string($db, $email) . '" AND '
                . 'password = PASSWORD("' . mysqli_real_escape_string($db, $password) . '")';
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            extract($row);
            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['access_level'] = $access_level;
            $_SESSION['name'] = $name;
        }
        mysqli_free_result($result);
        redirect('cms_index.php');
        break;
    case 'Logout':
        session_start();
        session_unset(); // si annulla la sessione cancellandone tutte le variabili di sessione
        session_destroy(); // se distrugge la sessione, che distrugge tutti i dati registrati
        redirect('cms_index.php');
        break;
    
    case 'Crea Account':
        $name = (isset($_POST['name'])) ? $_POST['name'] : '';
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $password_1 = (isset($_POST['password_1'])) ? $_POST['password_1'] : '';
        $password_2 = (isset($_POST['password_2'])) ? $_POST['password_2'] : '';
        $password = ($password_1 == $password_2) ? $password_1 : '';
        if (!empty($name) && !empty($email) && !empty($password)) {
            $sql = 'INSERT INTO cms_users '
                    . '(email, password, name) '
                    . 'VALUES '
                    . '("' . mysqli_real_escape_string($db, $email) . '", '
                    . 'PASSWORD("' . mysqli_real_escape_string($db, $password) . '") , '
                    . '"' . mysqli_real_escape_string($db, $name) . '")';
            mysqli_query($db, $sql) or die(mysqli_error($db));
            
            session_start();
            $_SESSION['user_id'] = mysqli_insert_id($db);
            $_SESSION['access_level'] = 1;
            $_SESSION['name'] = $name;
        }
        redirect('cms_index.php');
        break;
        
    case 'Modifica Account':
        $user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $name = (isset($_POST['name'])) ? $_POST['name'] : '';
        $access_level = (isset($_POST['access_level'])) ? $_POST['access_level'] : '';
        
        if (!empty($user_id) && !empty($email) && !empty($name) && !empty($access_level)) {
            $sql = 'UPDATE cms_users SET '
                    . 'email = "' . mysqli_real_escape_string($db, $email) . '", '
                    . 'name = "' . mysqli_real_escape_string($db, $name) . '", '
                    . 'access_level = "' . mysqli_real_escape_string($db, $access_level) . '", '
                    . 'WHERE '
                    . 'user_id = ' . $user_id;
            mysqli_query($db, $sql) or die(mysqli_error($db));
        }
        redirect('cms_admin.php');
        break;
        
    case 'Send my reminder!':
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        if (!empty($email)) {
            $sql = 'SELECT email FROM cms_users WHERE email="' . 
                    mysqli_real_escape_string($db, $email) . '"';
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));
            if (mysqli_num_rows($result) > 0) {
                $password = strtoupper(substr(shal(time()), rand(0,32), 8));
                $subject = 'Comic site password reset';
                $body = 'Looks like you forgot your password, eh? No worries. ' . 
                        'We\'ve reset it for you!' . "\n\n";
                $body .= 'Your new password is: ' . $password;
                mail($email, $subject, $body);
            }
            mysqli_free_result($result);
        }
        redirect('cms_loging.php');
        break;
        
    case 'Change my info':
        session_start();
        $email = (isset($_POST['email'])) ? $_POST['email'] : '';
        $name = (isset($_POST['name'])) ? $_POST['name'] : '';
        if (!empty($name) && !empty($email) && !empty($_SESSION['user_id']))
        {
            $sql = 'UPDATE cms_users SET '
                    . 'email = "' . mysqli_real_escape_string($db, $email) . '", '
                    . 'name = "' . mysqli_real_escape_string($db, $name) . '" '
                    . 'WHERE '
                    . 'user_id = ' . $_SESSION['user_id'];
            mysqli_query($db, $sql) or die(mysqli_error($db));
        }
        redirect('cms_cpanel.php');
        break;
    default:
        redirect('cms_index.php');
    }
} else {
    redirect('cms_index.php');
}
?>