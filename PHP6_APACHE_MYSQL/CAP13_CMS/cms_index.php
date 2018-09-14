<?php
include 'cms_header.inc.php';
require_once '../CAP12_ACCESSO_DEGLI_UTENTI/db.inc.php';
require 'cms_output_functions.inc.php';

$sql = 'SELECT article_id '
        . 'FROM '
        . 'cms_articles '
        . 'WHERE '
        . 'is_published = TRUE '
        . 'ORDER BY '
        . 'publish_date DESC';
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result)==0){
    echo '<p><strong>Non ci sono articoli da vedere.</strong></p>';
} else {
    while ($row = mysqli_fetch_array($result)) {
        output_story($db, $row['article_id'], TRUE);
    }
}
mysqli_free_result($result);
include 'cms_footer.inc.php';