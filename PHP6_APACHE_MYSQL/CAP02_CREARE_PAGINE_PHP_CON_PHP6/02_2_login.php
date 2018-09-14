<?php
session_unset();
?>
<html>
    <head>
        <title>Please Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/My.css">
        <link rel="stylesheet" href="../CSS/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <form class="w3-animate-zoom w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin-center-horizontal w3-margin-center-vertical" style="width:50%"
              name="FrmLogin" action="02_1_movie1.php" method="POST">
            <h2 class="w3-center">Enter your credencial</h2>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                <div class="w3-rest">
                    <input class="w3-input w3-border" type="text" name="user" value="" placeholder="Username" />
                </div>
            </div>
            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-lock"></i></div>
                <div class="w3-rest">
                    <input class="w3-input w3-border" type="password" name="pass" value="" placeholder="Password"/>
                </div>
            </div>
                <input class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding"
                       type="submit" value="Submit" name="submit" />
        </form>
    </body>
</html>
