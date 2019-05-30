<?php
require_once '../model/usuario.php';
class UsuarioController
{
	private $model_usu;

	public function __CONSTRUCT()
	{
		$this->model_usu = new Usuario();
	}

	public function IndexAdministrador()
	{
		require_once '../view/header.php';
		require_once '../view/index.php';
		require_once '../view/footer.php';

	}

	public function IndexDocente()
	{
		require_once '../view/headerDocente.php';
		require_once '../view/index.php';
		require_once '../view/footer.php';

	}

	public function IndexDirectora()
	{
		require_once '../view/headerDirectora.php';
		require_once '../view/index.php';
		require_once '../view/footer.php';

	}
	
	public function Lista()
	{
		require_once '../view/header.php';
		require_once '../view/lista_usuario.php';
		require_once '../view/footer.php';

	}
	
	public function Mantenedor()
	{
		require_once '../view/header.php';
		require_once '../view/form_usuario.php';
		require_once '../view/footer.php';
	}
	
	public function Modificar()
	{
		$usu = new Usuario();
		
		$usu = $this->model_usu->Get($_REQUEST['idUsuario']);
		
		require_once '../view/header.php';
		require_once '../view/form_usuario_modificar.php';
		require_once '../view/footer.php';
	}
	
	
	public function Guardar()
	{
		$usu = new Usuario();
		
		$usu->nombreCompleto = $_REQUEST['txtnombreCompleto'];
		$usu->apellidoPaterno = $_REQUEST['txtapellidoPaterno'];
		$usu->apellidoMaterno = $_REQUEST['txtapellidoMaterno'];
		$usu->correoElectronico = $_REQUEST['txtcorreo'];
		$usu->especialidad = $_REQUEST['txtespecialidad'];
		$usu->cuenta = $_REQUEST['txtcuenta'];
		$usu->password = $_REQUEST['txtpassword'];
		
		$this->model_usu->Insert($usu);
		
		header('Location: ../view/indexAdministrador.php');
	}
	
	public function Modifica()
	{
		$usu = new Usuario();
		
		$usu->idUsuario = $_REQUEST['idUsuario'];
		$usu->nombreCompleto = $_REQUEST['txtnombreCompleto'];
		$usu->apellidoPaterno = $_REQUEST['txtapellidoPaterno'];
		$usu->apellidoMaterno = $_REQUEST['txtapellidoMaterno'];
		$usu->correoElectronico = $_REQUEST['txtcorreo'];
		$usu->especialidad = $_REQUEST['txtespecialidad'];
		$usu->cuenta = $_REQUEST['txtcuenta'];
		$usu->password = $_REQUEST['txtpassword'];

		
		$this->model_usu->Actualizar($usu);
		
		header('Location: ../view/indexAdministrador.php');
	}
	
	public function Borrar()
	{
		$this->model_usu->Delete($_REQUEST['idUsuario']);
		header('Location: ../view/indexAdministrador.php');
		
	}
}
?>