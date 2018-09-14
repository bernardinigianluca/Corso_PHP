<?php
function upload(){
    $result = false;
    $immagine = '';
    $size = 0;
    $type = '';
    $nome = '';
    $max_size = 300000;
    $result = is_uploaded_file($_FILES['file']['tmp_name']);
    if (!$result){
        echo "Impossibile eseguire l'upload.";
        return false;
    }else{
        $size = $_FILES['file']['size'];
        if ($size > $max_size){
            echo "Il file è troppo grande.";
            return false;
        }
        $type = $_FILES['file']['type'];
        $nome = $_FILES['file']['name'];
        $immagine = file_get_contents($_FILES['file']['tmp_name']);
        $immagine = addslashes($immagine);
        
        include './Conn_Immagine.php';
        
        //$sql = "INSERT INTO immagini (nome, size, type) VALUES ('nome','25652','jpg')";
        $sql = "INSERT INTO immagini (Nome, size, type, immagine) VALUES ('$nome','$size','$type','$immagine')";
//        echo $sql . "<br>";
//        $result = mysql_query($sql, $conn) or die(mysql_error($conn));
        if ($conn->query($sql) === TRUE) {
               echo '<h1>Nuovo record creato con successo</h1>';
               echo $nome;
               echo '<br>';
               $result = TRUE;
           } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
           }
           $conn->close();
    }
}

