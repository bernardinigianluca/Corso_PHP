<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <H1>Insert Record</H1>
        <form action="Insert_record.php" method="POST">
            <table border="0">
            <tbody>
                <tr>
                    <td>Nome: </td>
                    <td><input type="text" name="nome" value="" size="20" /></td>
                </tr>
                <tr>
                    <td>Cognome: </td>
                    <td><input type="text" name="cognome" value="" size="20" /></td>
                </tr>
                <tr>
                    <td>Indirizzo: </td>
                    <td><input type="text" name="indirizzo" value="" size="20" /></td>
                </tr>
                 <tr>
                    <td>Citta: </td>
                    <td><input type="text" name="citta" value="" size="20" /></td>
                </tr>
                <tr>
                    <td>Telefono: </td>
                    <td><input type="text" name="telefono" value="" size="20" /></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email" value="" size="20" /></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" value="" size="20" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="insert" name="insert" /></td>
                </tr>
            </tbody>
        </table>
        </form>
        
        
         <?php
         if (isset($_POST["nome"])){
             
            include './connect.php';

           $nome = "'".$_POST['nome']."'";
           $cognome = "'".$_POST['cognome']."'";
           $indirizzo = "'".$_POST['indirizzo']."'";
           $citta = "'".$_POST['citta']."'";
           $telefono = "'".$_POST['telefono']."'";
           $email = "'".$_POST['email']."'";
           $password = "'".$_POST['password']."'";

           $sql = "INSERT INTO tblanagrafica (Nome, Cognome, Indirizzo, Citta, Telefono, email, password)
           VALUES ($nome,$cognome,$indirizzo,$citta,$telefono,$email,$password)";

           if ($conn->query($sql) === TRUE) {
               echo "New record created successfully";
           } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
           }

           $conn->close();
        }
        ?> 
        <h4><a href="Index.php">Ritorna a Index</a></h4>
    </body>
</html>
