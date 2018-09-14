<html>
    <head>
        <title>Cookies Test</title>
    </head>
    <body>
        <h1>Questa è la pagina di Test dei Cookies</h1>
        <ul>
            <li><a href="cookies_set.php">Set Cookies</a></li>
            <li><a href="cookies_view.php">View Cookies</a></li>
            <li><a href="cookies_delete.php">Delete Cookies</a></li>
        </ul>
        <script src="cookiechoices.js"></script>
        <script>//<![CDATA[
        document.addEventListener('DOMContentLoaded', function(event) {        
            cookieChoices.showCookieConsentDialog('Proseguendo la navigazione \n\
            su questo sito, acconsenti all\'uso dei cookie.',         
                'Chiudi', 'Maggiori Informazioni',                      
                         'http://indirizzo_pagina_cookie_policy');
           });
        //]]></script>
    </body>
</html>
