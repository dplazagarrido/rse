<?php
require_once '../model/curso.php';
class CursoController
{
	private $model_cur;

	public function __CONSTRUCT()
	{
		$this->model_cur = new Curso();
	}
	
	public function Index()
	{
		require_once '../view/header.php';
		require_once '../view/indexAdministrador.php';
		require_once '../view/footer.php';

	}
	

	public function Lista()
	{
		require_once '../view/header.php';
		require_once '../view/lista_curso.php';
		require_once '../view/footer.php';

	}
	
	public function Mantenedor()
	{
		require_once '../view/header.php';
		require_once '../view/form_curso.php';
		require_once '../view/footer.php';
	}
	
	public function Modificar()
	{
		$cur = new Curso();
		
		$cur = $this->model_cur->Get($_REQUEST['idCurso']);
		
		require_once '../view/header.php';
		require_once '../view/form_curso_modificar.php';
		require_once '../view/footer.php';
	}
	
	
	public function Guardar()
	{
		$cur = new Curso();
		
		$cur->nombre = $_REQUEST['txtnombre'];
		$cur->grado = $_REQUEST['txtgrado'];
		$cur->cantidadAlumnos = $_REQUEST['txtcantidadAlumnos'];

		$this->model_cur->Insert($cur);

		$message = "Curso creado exitosamente";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('Location: indexAdministrador.php');

	}
	
	public function Modifica()
	{
		$cur = new Curso();
		
		$cur->idCurso = $_REQUEST['txtidUsuario'];
		$cur->nombre = $_REQUEST['txtnombre'];
		$cur->grado = $_REQUEST['txtgrado'];
		$cur->cantidadAlumnos = $_REQUEST['txtcantidadAlumnos'];

		$this->model_cur->Actualizar($cur);
		
		header('Location: indexAdministrador.php');
	}
	
	public function Borrar()
	{
		$this->model_cur->Delete($_REQUEST['idCurso']);
		header('Location: indexAdministrador.php');
		
	}
}
?>