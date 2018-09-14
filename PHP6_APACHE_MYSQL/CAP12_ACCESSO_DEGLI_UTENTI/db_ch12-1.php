<?php

include 'db.inc.php';

$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD) or die('Collegamento '
        . 'non riuscito. Verifica i parametri di collegamento.');
mysqli_select_db($db, MYSQL_DB) or die(mysqli_error($db));

// crea la tabella degli utenti
$query = 'CREATE TABLE IF NOT EXISTS site_user('
        . 'user_id  INTEGER     NOT NULL    AUTO_INCREMENT,'
        . 'username VARCHAR(20) NOT NULL,'
        . 'password CHAR(41)    NOT NULL,'
        . ''
        . 'PRIMARY KEY (user_id)'
        . ')'
        . 'ENGINE=MyISAM';
mysqli_query($db, $query) or die (mysqli_error($db));

// crea la tabella delle informazioni degli utenti
    $query = 'CREATE TABLE IF NOT EXISTS site_user_info ('
            . 'user_id      INTEGER     NOT NULL,'
            . 'first_name    VARCHAR(20) NOT NULL,'
            . 'last_name    VARCHAR(20) NOT NULL,'
            . 'email        VARCHAR(50) NOT NULL,'
            . 'city         VARCHAR(20),'
            . 'state        CHAR(2),'
            . 'hobbies      VARCHAR(255),'
            . ''
            . 'FOREIGN KEY (user_id) REFERENCES site_user(user_id)'
            . ')'
            . 'ENGINE=MyISAM';
    mysqli_query($db, $query) or die(mysqli_error($db));

// riempi la tabella degli utenti
    $query = 'INSERT IGNORE INTO site_user '
            . '(user_id, username, password) '
            . 'VALUES'
            . '(1, "john", PASSWORD("secret")),'
            . '(2, "sally", PASSWORD("password"))';
    mysqli_query($db, $query) or die(mysqli_error($db));
    
// riempi la tabella delle informazioni degli utenti
    $query = 'INSERT IGNORE INTO site_user_info '
            . '(user_id, first_name, last_name, email, city, state, hobbies)'
            . 'VALUES'
            . '(1, "John", "Doe", "jdo@example.com", NULL, NULL, NULL),'
            . '(2, "Sally", "Smith", "ssmith@example.com", NULL, NULL, NULL)';
    mysqli_query($db, $query) or die(mysqli_error($db));
    echo 'Success!';