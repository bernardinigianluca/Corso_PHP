<html>
    <head>
        <meta charset="UTF-8">
        <title>Create table</title>
    </head>
    <body>
        <h1>Create Table</h1>
          <?php
          
        include './connect.php';

        // sql to create table
        $sql = "CREATE TABLE IF NOT EXISTS tblAnagrafica (
                idAnagrafica INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                Nome VARCHAR(30) NOT NULL,
                Cognome VARCHAR(30) NOT NULL,
                Indirizzo VARCHAR(30),
                Citta VARCHAR(30),
                Telefono VARCHAR(20),
                email VARCHAR(50),
                password VARCHAR(20) NOT NULL,
                reg_date TIMESTAMP
                )engine=MyISAM";

        if ($conn->query($sql) === TRUE) {
            echo "Table tblAnagrafica created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
        ?>
        <h4><a href="Index.php">Ritorna a Index</a></h4>
    </body>
</html>
