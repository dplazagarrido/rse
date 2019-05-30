<?php
require_once '../model/reserva.php';
require_once '../model/bloque.php';
class ReservaController 
{
	private $model_res;

	public function __CONSTRUCT()
	{
		$this->model_res = new Reserva();
	}

	public function Index()
	{
		require_once '../view/header.php';
		require_once '../view/index.php';
		require_once '../view/footer.php';
	}
	
	public function ListaReservaDocente()
	{
		$res = new Reserva();

		$res->idReserva = $_REQUEST['idUsuario'];

		require_once '../view/headerDocente.php';
		require_once '../view/lista_reserva.php';
		require_once '../view/footer.php';
	}

	public function ListaReservaAdministrador()
	{
		require_once '../view/header.php';
		require_once '../view/lista_reserva_admin.php';
		require_once '../view/footer.php';
	}
	
	public function Mantenedor()
	{
		require_once '../view/headerDocente.php';
		require_once '../view/form_reserva.php';
		require_once '../view/footer.php';
	}
	
	public function Preparar()
	{
		$res = new Reserva();
		
		$res->idUsuario = $_REQUEST['idusuario'];
		$res->idCurso = $_REQUEST['txtcurso'];
		$res->idLaboratorio = $_REQUEST['txtlaboratorio'];
		$res->idTipoReserva = $_REQUEST['txttiporeserva'];
		$res->fecha = $_REQUEST['txtfecha'];
		$res->tipojornada = $_REQUEST['txtjornada'];

		$this->model_res->Insert($res);

		require_once '../view/headerDocente.php';
		require_once '../view/bloque_picker.php';
		require_once '../view/footer.php';
	}

	public function Guardar()
	{
		$blo = new Bloque();

		foreach($this->model_res->GetLast() as $row): 
			$blo->reserva_idReserva = $row->idReserva;
		endforeach;
		$blo->idBloque = $_REQUEST['idBloque'];

		$this->model_res->ModificarBloque($blo);
		
		header('Location: indexDocente.php');
	}
	
		public function Modifica()
	{
		$res = new Reserva();
		
		$res->idUsuario = $_REQUEST['idUsuario'];
		$res->idCurso = $_REQUEST['txtcurso'];
		$res->idLaboratorio = $_REQUEST['txtlaboratorio'];
		$res->idTipoReserva = $_REQUEST['txttiporeserva'];
		$res->fecha = $_REQUEST['txtfecha'];
		$res->tipojornada = $_REQUEST['txtjornada'];
	
		$this->model_res->Actualizar($res);
		
		header('Location: ../index.php');
		require_once '../view/headerDocente.php';
		require_once '../view/bloque_picker.php';
		require_once '../view/footer.php';
	}

	public function Borrar()
	{
		$this->model_res->Delete($_REQUEST['idReserva']);
		header('Location: indexDocente.php');
		
	}



	
	/*
		Aún falta agregar el modificar reserva
		para que no hayan problemas después

		SE IMPLMENTARÁ MÁS TARDE
	*/
}
?>