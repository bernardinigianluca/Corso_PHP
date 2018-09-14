<?php
//if(isset($_POST["servername"])){
    $servername = 'localhost';
    $username = 'root';
    $password = 'ROOT';
    $dbname = "dbintegris";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
//    }
?> 

