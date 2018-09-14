<?php
require_once '../CAP12_ACCESSO_DEGLI_UTENTI/db.inc.php';

$user_id = (isset($_GET['user_id']) && ctype_digit($_GET['user_id'])) ? $_GET['user_id'] : '';

if (empty($user_id)) {
    $name = '';
    $email = '';
    $access_level = '';
} else {
    $sql = 'SELECT name, email, access_level '
            . 'FROM '
            . 'cms_users '
            . 'WHERE user_id=' . $user_id;
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    $row = mysqli_fetch_array($result);
    extract($row);
    mysqli_free_result($result);
}

include 'cms_header.inc.php';

if (empty($user_id)) {
    echo '<h1>Creazione Account</h1>';
} else {
    echo '<h1>Modifiche Account</h1>';
}
?>
<form action="cms_transact_user.php" method="POST">
    <table>
        <tr>
            <td><label for="name">Nome completo:</label></td>
            <td><input type="text" id="name" name="name" maxlength="100" 
                       value="<?php echo htmlspecialchars($name); ?>" /></td>
<!--                       placeholder="nome completo" required /></td>-->
        </tr>
        <tr>
            <td><label for="email">Email Address:</label></td>
            <td><input type="email" id="email" name="email" maxlength="100"
                       value="<?php echo htmlspecialchars($email); ?>" /></td>
<!--                       placeholder="example@hotmail.com" required/></td>-->
        </tr>
        <?php
        if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 3)
        {
        echo '<tr><td>Livelli di Accesso</td><td>';
        
        $sql = "SELECT "
                . "access_level, access_name "
                . "FROM "
                . "cms_access_levels "
                . "ORDER BY "
                . "access_level DESC";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        while ($row = mysqli_fetch_array($result)) {
            echo '<input type="radio" id="acl_' . $row['access_level'] . 
                    '" name="access_level" value="' . $row['access_level'] . '"';
            
            if($row['access_level']==$access_level) {
            echo ' checked="checked"';
            }
            echo '/> <label for="acl_' . $row['access_level'] . '">' .
                    $row['access_name'] . '</label><br/>';
        }
        mysqli_free_result($result);
        echo '</td></tr>';
        }
        
        if (empty($user_id)) {
            ?>
        <tr>
            <td><label for="password_1">Password:</label></td>
            <td><input type="password" id="password_1" name="password_1" maxlength="50" required /></td>
        </tr>
        <tr>
            <td><label for="password_2">Password (riscrivi la password):</label></td>
            <td><input type="password" id="password_2" name="password_2" maxlength="50" required /></td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="submit" name="action" value="Crea Account"/></td>
        </tr>
        <?php
        } else {
        ?>
        <tr>
            <td> </td>
            <td>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                <input type="submit" name="action" value="Modifica Account"/>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</form>
<?php
        include 'cms_footer.inc.php';
?>
