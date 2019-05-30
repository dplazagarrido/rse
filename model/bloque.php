<?php
class Bloque
{
	//variable de conección
	private $conn;
	
	//atributos de la tabla
	public $idBloque;
	public $horaInicio;
	public $horaTermino;
	public $fecha;
	public $numerobloque;
	public $tipojornada;
	public $disponible;
	public $reserva_idReserva;

	
	//constructor
	public function __CONSTRUCT()
	{
		try
		{
			$this->conn = Database::Conn();
						
		}
		catch(Exception $e)
		{
			die($e->getMessage());
			
		}
		
	}

	public function Modificar($blo)
	{
		$sql= $this->conn->prepare("UPDATE bloque SET disponible = 0, reserva_idReserva = ? where idBloque = ?");
		$sql->execute(array($blo->reserva_idReserva,$blo->idBloque));
	}













	

	public function Listar()
	{
		
		$sql = $this->conn->prepare("SELECT * FROM bloque");
		$sql->execute();
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
	
	
	public function Get($idBloque)
	{
		$sql = $this->conn->prepare("select * from bloque where idBloque = ?");
		$sql->execute(array($idBloque));
		
		return $sql->fetch(PDO::FETCH_OBJ);
		
	}
	
	public function ListarEspecificos($fecha)
	{
		
		$sql = $this->conn->prepare("SELECT * FROM bloque where fecha = ? AND tipojornada = ? AND disponible = 1");
		$sql->execute(array($fecha, $tipojornada));
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	
	
}
?>