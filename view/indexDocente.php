<?php
require_once '../model/database.php';

$controller = 'usuario';

if(!isset($_REQUEST['c']))
{
	//echo 'default';
	require_once "../controller/$controller.controller.php";
	$controller = ucwords($controller) .'Controller';
	$controller = new $controller;
	$controller->IndexDocente();
	
}
else
{
	$controller = strtolower($_REQUEST['c']);
	//echo $controller;
	$accion = $_REQUEST['a'];
	//echo $accion;
	require_once "../controller/$controller.controller.php";
	$controller = ucwords($controller).'Controller';
	$controller = new $controller;
	
	call_user_func(array($controller,$accion));
	
	
	
}

?>