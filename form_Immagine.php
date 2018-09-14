<?php
    include './function_upload.php';
    if (isset($_FILES['file'])){
        upload();
        echo '<br><a href="'. $_SERVER['PHP_SELF'] .'">Ritorna<a/>';
        return;
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Form Immagine</title>
    </head>
    <body>
        <h1>Upload Immagine</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <input type="file" name="file" value="" width="40" /><br>
            <input type="submit" value="Invia" />
        </form>
        <h4><a href="Index.php">Ritorna a Index</a></h4>
    </body>
</html>
