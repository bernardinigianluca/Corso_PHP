<?php
include './Conn_Immagine.php';

$sql = "SELECT idImmagini, immagine, nome, size, type, last_update "
        . "FROM immagini "
        . "ORDER BY idImmagini ASC";

$result = $conn->query($sql);

echo '<h1>Tabella Immagini</h1>';
        
if ($result->num_rows > 0) {
    echo '<table border="1">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Immagine</th>
            <th scope="col">Nome</th>
            <th scope="col">size (bytes)</th>
            <th scope="col">type</th>
            <th scope="col">last Update</th>
            <th scope="col">Item</th>
        </tr>';
    while($row = $result->fetch_assoc()){
        echo '<tr>' .
             '<td>' . $row["idImmagini"]. '</td>' .
             '<td>' . '' . '</td>' .
             '<td>' . $row["nome"] . '</td>' .
             '<td>' . $row["size"] . '</td>' .
             '<td>' . $row["type"] . '</td>' .
             '<td>' . $row["last_update"] . '</td>' .
             '<td>' . '<input type = "checkbox" name = "Delete" value = "'. $row["idImmagini"] .'" />';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>Nessun record presente nell database!</p>';
}   
?>
<h4><a href="Index.php">Ritorna a Index</a></h4>

