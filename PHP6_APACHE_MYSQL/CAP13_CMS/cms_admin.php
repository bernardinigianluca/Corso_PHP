<?php
require '../CAP12_ACCESSO_DEGLI_UTENTI/db.inc.php';
include './cms_header.inc.php';

$sql = "SELECT access_level, access_name "
        . "FROM cms_access_levels "
        . "ORDER BY access_name ASC";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));
$privileges = array();
while ($row = mysqli_fetch_assoc($result)) {
    $privileges[$row['access_level']] = $row['access_name'];
}
mysqli_free_result($result);

echo '<h2>Utente administratore</h2>';

$limit = count($privileges);
for($i = 1; $i <= $limit; $i++) {
    echo '<h3>' . $privileges[$i] . '</h3>';
    $sql = 'SELECT '
            . 'user_id, name '
            . 'FROM '
            . 'cms_users '
            . 'WHERE '
            . 'access_level = ' . $i . ' '
            . 'ORDER BY '
            . 'name ASC';
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    
    if (mysqli_num_rows($result) == 0) {
        echo '<ul>';
        echo '<li><strong>Non ci sono account di ' . $privileges[$i] . ' registrati.</strong></li>';
        echo '</ul>';
    } else {
        echo '<ul>';
        while ($row = mysqli_fetch_assoc($result)) {
            if ($_SESSION['user_id']==$row['user_id']) {
                echo '<li>' . htmlspecialchars($row['name']) . '</li>';
            } else {
                echo '<li><a href="cms_user_account.php?user_id=' . 
                        $row['user_id'] . '">' . htmlspecialchars($row['name']) .
                        '</a></li>';
            }
        }
        echo '</ul>';
    }
    mysqli_free_result($result);
}
require './cms_footer.inc.php';
?>