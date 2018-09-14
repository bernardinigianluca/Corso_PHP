
<html>
    <head>
        <meta charset="UTF-8">
        <title>Conexione</title>
    </head>
    <body>
        <H1>Conexione a Database MySQL - Integris</h1>
        
<!--        Prima del form includiamo il controllo di PHP
        per vedere si se deve mostrare il form-->
        
        <?php
        
        if(isset($_POST["servername"])){
            $servername = $_POST["servername"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $dbname = "dbintegris";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            } else {
                echo 'Connect sucessfully!';
                echo '<h4><a href="Index.php">Ritorna a Index</a></h4>'; 
                return;    
                }
            }
        ?>
        
        
        <form action="<?PHP $_SERVER['PHP_SELF'] ?>" method="POST">
            <table border="0">
            <tbody>
                <tr>
                    <td>Servername: </td>
                    <td><input type="text" name="servername" value="" size="20" /></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="" size="20" /></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" value="" size="20" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Connect" name="Connect" /></td>
                </tr>
            </tbody>
        </table>
        </form>
    </body>
</html>