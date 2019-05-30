<?php
require_once '../model/bloque.php';
class BloqueController
{
	private $model_blo;

	public function __CONSTRUCT()
	{
		$this->model_blo = new Bloque();
	}
	
	public function Index()
	{
		require_once '../view/headerDocente.php';
		require_once '../view/index.php';
		require_once '../view/footer.php';

	}
	
	public function Lista()
	{
		require_once '../view/headerDocente.php';
		require_once '../view/listar_bloques.php';
		require_once '../view/footer.php';
	}

	public function SeleccionarBloques()
	{
		require_once '../view/headerDocente.php';
		require_once '../view/bloque_picker.php';
		require_once '../view/footer.php';
	}

	public function Modificar()
	{
		$blo = new Bloque();
		
		$blo = $this->model_blo->Modificar($_REQUEST['idBloque']);

		
	}

}
?>