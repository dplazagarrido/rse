<! DOCTYPE html>


<?php
session_start(); //@ previene warning contra sesiones automáticas (no recomendado)
if(!isset($_SESSION["cuenta"])){ 
    header("Location: login.php"); 
    exit;
}else if($_SESSION["tipoUsuario_idtipoUsuario"]!=1){
    header("Location: errorPermiso.php");
    exit;
}
?>



<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	.bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>
<div class="bs-example">
    <nav id="myNavbar" class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav"> 
                    <li class="dropdown">
                    <a title="icon" href="?c=Usuario&a=IndexAdministrador"> <img src="../css/icon.png" alt="icon" width="50" height="50" /></a>
                </li>



                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Docentes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?c=Usuario&a=Mantenedor">Agregar</a></li>
                            <li><a href="?c=Usuario&a=Lista">Listar</a></li>
                        </ul>
                    </li>
					<li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Curso <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?c=Curso&a=Mantenedor">Agregar</a></li>
                            <li><a href="?c=Curso&a=Lista">Listar</a></li>
                        </ul>
						
                    </li>
					<li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Reserva <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?c=Reserva&a=ListaReservaAdministrador">Listar</a></li>
                        </ul>
						
                    </li>
					<li><a href="#">Estadisticas</a></li>
                    <li><a href="logout.php">Cerrar Sesion</a></li>

                     <li><a><?php
                          if (isset($_SESSION['nombreCompleto']))
                             echo $_SESSION['nombreCompleto'];
                           ?></h1>  </a></li>
					
                </ul>





         
            </div><!-- /.navbar-collapse -->



</body>
</html>                  