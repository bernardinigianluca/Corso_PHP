<html>
    <head>
        <meta charset="UTF-8">
        <title>Select All</title>
    </head>
    <body>
        <h1>Select All from tblAnagrafica</h1>
        <form action="action"></form>
        <?php
        include './connect.php';
        
        $sql = "SELECT * FROM dbintegris.tblanagrafica";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<table border="1">
                <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Citta</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">email</th>
                        <th scope="col">Item</th>
                </tr> <br>';
            while($row = $result->fetch_assoc()){
                echo '<tr>' .
                     '<td>' . $row["idAnagrafica"]. '</td>' .
                     '<td>' . $row["Nome"] . '</td>' .
                     '<td>' . $row["Cognome"] . '</td>' .
                     '<td>' . $row["Indirizzo"] . '</td>' .
                     '<td>' . $row["Citta"] . '</td>' .
                     '<td>' . $row["Telefono"] . '</td>' .
                     '<td>' . $row["email"]. '</td>' .
                     '<td>' . '<input type = "checkbox" name = "Delete" value = "'. $row["idAnagrafica"] .'" /> <br>';
            }
        }
        echo '</table>'
        ?>
        <h4><a href="Index.php">Ritorna a Index</a></h4>
    </body>
</html>
