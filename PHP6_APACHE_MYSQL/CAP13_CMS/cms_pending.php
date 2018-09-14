<?php
require_once '../CAP12_ACCESSO_DEGLI_UTENTI/db.inc.php';
include './cms_header.inc.php';

echo '<h2>Articoli disponibili</h2>';
echo '<h3>Articoli in attessa di essere approvati</h3>';
$sql = "SELECT "
        . "article_id, title, UNIX_TIMESTAMP(submit_date) AS submit_date "
        . "FROM "
        . "cms_articles "
        . "WHERE "
        . "is_published = FALSE "
        . "ORDER BY "
        . "title ASC";
$result = mysqli_query($db,$sql) or die(mysqli_error($db));

if (mysqli_num_rows($result)==0) {
    echo '<p><strong>Nessun articolo in sospeso disponibile.</strong></p>';
} else {
    echo '<ul>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<li><a href="cms_review_article.php?article_id=' . 
                $row['article_id'] . '">' . htmlspecialchars($row[$title]) .
                '</a> (' . date('F j, Y', $row['submit_date']) . ')</li>';
    }
    echo '</ul>';
}
mysqli_free_result($result);

echo '<h3>Articoli pubbicati</h3>';
$sql = "SELECT "
        . "article_id, title, UNIX_TIMESTAMP(publish_date) AS publish_date "
        . "FROM "
        . "cms_articles "
        . "WHERE "
        . "is_published = TRUE "
        . "ORDER BY "
        . "title ASC";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

if (mysqli_num_rows($result) == 0) {
    echo '<p><strong>Non ci sono articoli per pubblicare.</strong></p>';
} else {
    echo '<ul>';
    while ($row = mysqli_fetch_array($result)) {
        echo '';
    }
}