<?php
//if(isset($_POST["servername"])){


    $servername = 'localhost';
    $username = 'root';
    $password = 'ROOT';
    $dbname = "mydb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } elseif (isset($_GET['id'])){
        echo '<h1>Connessione a MySQL - Mydb - Immagini</h1>';
        echo 'Connect sucessfully!';
        echo '<h4><a href="./Index.php">Ritorna a Index</a></h4>';
}