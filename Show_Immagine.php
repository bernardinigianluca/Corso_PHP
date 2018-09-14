<?php

if (isset($_GET['id'])){
    $id = intval($_GET['id']);
    include './Conn_Immagine.php';
    $sql = "SELECT idImmagini, type, immagine FROM immagini WHERE idImmagini='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $id_img = $row['idImmagini'];
    $type = $row['type'];
    $img = $row['immagine'];
    header("Content-Type: " . $type);
    echo $row['immagine'];
//    echo '<img src="'.$row['immagine'].'">';
} else {
    echo 'Impossibile soddisfare la richiesta.';
    echo '<h4><a href="Index.php">Ritorna a Index</a></h4>';
}


//if (isset($_GET['id'])){
//    $id = intval($_GET['id']);
//    include './Conn_Immagine.php';
//    $sql = "SELECT idImmagini, type, immagine FROM immagini WHERE idImmagini='$id'";
//    $result = mysqli_query($conn, $sql);
//    $row = mysqli_fetch_array($result);
//    $id_img = $row['idImmagini'];
//    $type = $row['type'];
//    $img = $row['immagine'];
//    if (!$id_img){
//        echo "Id sconosciuto";
//    } else {
//        header("Content-type:" . $type);
//        echo $img;
//    }
//} else {
//    echo 'Impossibile soddisfare la richiesta.';
//    echo '<h4><a href="Index.php">Ritorna a Index</a></h4>';
//}
