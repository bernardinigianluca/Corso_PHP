<?php
require_once '../CAP12_ACCESSO_DEGLI_UTENTI/db.inc.php';
include './cms_header.inc.php';

$action = (isset($_GET['action'])) ? $_GET['action'] : ''; 
$article_id = (isset($_GET['article_id']) && ctype_digit($GET['article_id'])) ?
        $_GET['article_id'] : '';
$title = (isset($_POST['title'])) ? $_POST['title'] : '';
$article_text = (isset($_POST['article_text'])) ? $_POST['article_text'] : '';
$user_id = (isset($_POST['user_id'])) ? $_POST['user_id'] : '';

if ($action == 'edit' && !empty($article_id)) {
    $sql = 'SELECT '
            . 'title, article_text, user_id '
            . 'FROM '
            . 'cms_articles '
            . 'WHERE '
            . 'article_id = ' . $article_id;
    $result = mysqli($db, $sql) or die(mysqli_error($db));
    $row = mysqli_fetch_array($result);
    extract($row);
    myslqi_free_result($result);
}
?>
<h2>Compose Article</h2>
<form action="cms_transact_article.php" method="POST">
    <table>
        <tr>
            <td><label for="title">Title:</label></td>
            <td><input type="text" name="title" id="title" maxlength="255"
            value="<?php echo htmlspecialchars($title); ?>"/></td>
        </tr>
        <tr>
            <td><label for="article_text">Text:</label></td>
            <td><textarea name="article_text" name="article_text" rows="10" cols="60">
                <?php echo htmlspecialchars($article_text); ?></textarea></td>
        </tr><tr>
            <td> </td>
            <td>
                <?php
                if ($_SESSION['access_level'] < 2) {
                    echo '<input type="hidden" name="user_id" value="' . $user_id . '"/>';
                }
                if (empty($article_id)) {
                    echo '<input type="submit" name="action" value="Submit New Article"/>';
                } else {
                    echo '<input type="hidden" name="article_id" value=' . $article_id . '"/>';
                    echo '<input type="submit" name="action" value="Save Changes"/>';
                }
                ?>
            </td>
        </tr>
    </table>
</form>
<?php
require_once './cms_footer.inc.php';
?>