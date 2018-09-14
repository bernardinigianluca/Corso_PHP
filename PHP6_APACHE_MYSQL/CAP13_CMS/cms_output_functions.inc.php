<?php

// restituisce una stringa troncata a un numero massimo di caraterri. Se
// è stata troncata, la stringa aggiungerà $tail (coda) alla fine.
function trim_body($text, $max_length = 500, $tail = '...'){
    $tail_len = strlen($tail);  // strlen() Restituisce la lunghezza massima della stringa.
    if (strlen($text) > $max_length){
        $tmp_text = substr($text,0,$max_length - $tail_len); 
        //substr() accetta una stringa, uno scarto iniziale e facoltativamente 
        //un valore di lunghezza e restituisce una sottostringa che inizia dalla
        // posizione indicata
        if (substr($text, $max_length - $tail_len, 1) == ' ') {
        $text = $tmp_text;
        }
        else {
        $pos = strrpos($tmp_text, ' '); //strrpos ricerca una stringa dalla fine della stringa
        $text = substr($text, 0, $pos);
        }
    $text = $text . $tail;
    }
    return $text;
}

// visualizza un articolo dal database verso il browser.
function output_story($db, $article_id, $preview_only = FALSE){
    if (empty($article_id)) {
        return;
    }
    $sql = 'SELECT '
            . 'name, is_published, title, article_text, '
            . 'UNIX_TIMESTAMP(submit_date) AS submit_date, '
            . 'UNIX_TIMESTAMP(publish_date) AS publish_date '
            . 'FROM '
            . 'cms_articles a JOIN cms_users u ON a.user_id = u.user_id '
            . 'WHERE '
            . 'article_id = ' . $article_id;
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    
    if ($row = mysqli_fetch_assoc($result)) {
        extract($row);
        echo '<h2>' . htmlspecialchars($title) . '</h2>';
        echo '<p>By: ' . htmlspecialchars($name) . '</p>';
        echo '<p>';
        if ($row['is_published']) {
            echo date('F j, Y', $publish_date);
        } else {
            echo "L'articolo non è ancora stato pubblicato.";
        }
        echo '</p>';
        if ($preview_only) {
            echo '<p>' . nl2br(htmlspecialchars(trim_body($article_text))) . '</p>';
            echo '<p><a href="cms_view_article.php?article_id=' . $article_id . '">Leggi la storia completa</a></p>';
        } else {
            echo '<p>' . nl2br(htmlspecialchars($article_text)) . '</p>';
        }
    }
    mysqli_free_result($result);
}

// visualizza i commenti
function show_comments($db, $article_id, $show_link = TRUE) {
        if (empty($article_id)) {
            return;
        }
        $sql = 'SELECT is_published FROM cms_articles WHERE article_id = ' . $article_id;
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        $row = mysqli_fetch_assoc($result);
        $is_published = $row['is_published'];
        mysqli_free_result($result);
        $sql = 'SELECT '
                . 'comment_text, UNIX_TIMESTAMP(comment_date) AS comment_date, name, email '
                . 'FROM '
                . 'cms_comments c LEFT OUTER JOIN cms_users u ON c.user_id = u.user_id '
                . 'WHERE '
                . 'article_id = ' . $article_id . ''
                . 'ORDER BY '
                . 'comment_date DESC';
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        // Se $show_link e vero aggiunge un link per l'utente di aggiungere un commento
        if ($show_link) {
            echo '<h3>' . mysqli_num_rows($result) . ' Commenti';
            if (isset($_SESSION['user_id']) and $is_published) {
                echo ' - <a href="cms_comment.php?article_id=' . $article_id . '">Aggiungi uno</a>';
            }
            echo '</h3>';
        }
        
        if (mysqli_num_rows($result)) {
            echo '<div>';
            while ($row = mysqli_fetch_array($result)) {
                extract($row);
                echo '<span>' . htmlspecialchars($name) . '</span>';
                echo '<span> (' . date('l F j, Y H:i', $comment_date) . ') </span>';
                echo '<p>' . nl2br(htmlspecialchars($comment_text)) . '</p>';
            }
            echo '</div>';
        }
        echo '<br>';
        mysql_free_result($result);
    }
?>