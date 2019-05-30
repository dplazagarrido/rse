<?php
ob_start();
session_start();
session_unset();
unset($_SESSION);
session_destroy();
?>
<!doctype html>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Php - MVC</title>

        <script type="text/javascript">
        </script>
    </head>
    <body>
        <h1>Error</h1>
        <h3>No tiene los permisos para estar aqui!</h3>
        <hr>
        <a href="../index.php">Volver al Login</a>
    </body>    
</html>

