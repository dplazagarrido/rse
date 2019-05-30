<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>RSE</title>

        <script type="text/javascript">
        </script>
    </head>
    <body>
        <?php
        if (isset($_REQUEST["cuenta"]) && isset($_REQUEST["password"])) {

            $cuenta = $_REQUEST["cuenta"];
            $password = $_REQUEST["password"];

            require_once('../controller/login.controller.php');
            $obj = new LoginController();

            $data = $obj->ValidaAcceso($cuenta, $password);
            //var_dump($data);
            // en $data estan los datos de que trajo la query 
            // puedes llenar los datos en variables de session y asi se pueden ver en todas las páginas 
            // Rredireccioamos a la página master
            if ($data != NULL && $data[0]["tipoUsuario_idtipoUsuario"] == 1) {
                $_SESSION["cuenta"] = $data[0]["cuenta"];
                $_SESSION["nombreCompleto"] = $data[0]["nombreCompleto"];
                $_SESSION["tipoUsuario_idtipoUsuario"] = $data[0]["tipoUsuario_idtipoUsuario"];
                $_SESSION["idUsuario"] = $data[0]["idUsuario"];
                header("Location: indexAdministrador.php");

            } else if($data != NULL && $data[0]["tipoUsuario_idtipoUsuario"] == 2) {
                $_SESSION["cuenta"] = $data[0]["cuenta"];
                $_SESSION["nombreCompleto"] = $data[0]["nombreCompleto"];
                $_SESSION["tipoUsuario_idtipoUsuario"] = $data[0]["tipoUsuario_idtipoUsuario"];
                $_SESSION["idUsuario"] = $data[0]["idUsuario"];
                header("Location: indexDirectora.php");

            } else if($data != NULL && $data[0]["tipoUsuario_idtipoUsuario"] == 3) {
                $_SESSION["cuenta"] = $data[0]["cuenta"];
                $_SESSION["nombreCompleto"] = $data[0]["nombreCompleto"];
                $_SESSION["tipoUsuario_idtipoUsuario"] = $data[0]["tipoUsuario_idtipoUsuario"];
                $_SESSION["idUsuario"] = $data[0]["idUsuario"];
                header("Location: indexDocente.php");
            }else{
            header("Location: errorLogin.php");
        }
    }
        ?>        
        <form id="frm" name="frm" action="index.php" method="post">
            <input type="text" id="cuenta" name="cuenta" value="<?php echo $cuenta; ?>" />
            <input type="text" id="password" name="password" value="<?php echo $password; ?>" />
        </form>
    </body>    
</html>

