<?php

echo '<h1>Elenco Immagini</h1>';
include './Conn_Immagine.php';

$sql = "SELECT idImmagini, nome FROM immagini ORDER by nome ASC";
$result = mysqli_query($conn, $sql);




if(mysqli_num_rows($result)){
    echo '<ol type="1">';
    while ($row = mysqli_fetch_array($result)) {
    $id = $row['idImmagini'];
    $nome = $row['nome'];
    echo "<li><a href=./Show_Immagine.php?id=".$id.">".$nome."</a></li>";
    }
    echo '</ol>';
}else{
    echo '<p>Nessun file presente nel database</p>';
}


echo '<h4><a href="Index.php">Ritorna a Index</a></h4>';
