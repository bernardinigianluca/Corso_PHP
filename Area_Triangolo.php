<html>
    <head>
        <meta charset="UTF-8">
        <title>Corso PHP - Area del Triangolo</title>
    </head>
    <body>
        <h1>AREA DEL TRIANGOLO</h1>
        <form name="frmAreaTriangolo" action="Area_Triangolo.php" method="POST" enctype="multipart/form-data">
            Base: <input type="text" name="Base" size="10" value=""><br/>
            Altura: <input type="text" name="Altura" size="10" value="" /><br/>
            <input type="submit" value="Submit" name=OK />
        </form>
        <?php
        // variable $_POST non si vedono i valori
        // variable $_POST superglobal
        // var_dump($_POST per vedere i valori delle superglobal
        if (isset($_POST["Base"])){
            $base = $_POST["Base"];
            $altura = $_POST["Altura"];
            $area = ($base * $altura)/2;
            $area = number_format($area, 2);
            echo "L'area del triangolo è: ".$area;
            }
        ?>
        <h6><a href="Index.php">Ritorna a Index</a></h6>
    </body>
</html>
