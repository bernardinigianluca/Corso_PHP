<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'connect.php';
        
        // sql to delete a record
        $sql = "DELETE FROM dbintegris.tblanagrafica WHERE idAnagrafica=1";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
        ?>      
        <h4><a href="Index.php">Ritorna a Index</a></h4>
    </body>
</html>
