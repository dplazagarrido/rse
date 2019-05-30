<?php
class Reserva
{
	//variable de conección
	private $conn;
	
	//atributos de la tabla
	public $idUsuario;
	public $idCurso;
	public $idReserva;
	public $idLaboratorio;
	public $idTipoReserva;
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

	public function ListaReservaAdmin()
	{
		
		$sql = $this->conn->prepare("SELECT res.idReserva,  CONCAT(usu.nombreCompleto, ' ', usu.apellidoPaterno) nombre, CONCAT(cur.grado, 'º' ,cur.nombre) curso, res.laboratorio_idlaboratorio,tire.descripcion FROM reserva AS res
			JOIN usuario AS usu ON usu.idUsuario = res.usuario_idusuario
			JOIN curso AS cur ON cur.idCurso = res.Curso_idCurso
			JOIN tiporeserva AS tire ON tire.idTipoReserva = res.tipoReserva_idtipoReserva;");
		$sql->execute();
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListaReservaDocente($idUsuario)
	{
		$sql = $this->conn->prepare("SELECT res.idReserva,  CONCAT(usu.nombreCompleto, ' ', usu.apellidoPaterno) nombre, CONCAT(cur.grado, 'º' ,cur.nombre) curso, res.laboratorio_idlaboratorio,tire.descripcion FROM reserva AS res
			JOIN usuario AS usu ON usu.idUsuario = res.usuario_idusuario
			JOIN curso AS cur ON cur.idCurso = res.Curso_idCurso
			JOIN tiporeserva AS tire ON tire.idTipoReserva = res.tipoReserva_idtipoReserva
			WHERE res.usuario_idusuario = ? ;");
		$sql->execute(array($idUsuario));
		
		return $sql->fetchAll(PDO::FETCH_OBJ);

	}
	
	public function Insert($res)
	{
		$sql = $this->conn->prepare("INSERT INTO reserva (usuario_idUsuario,Curso_idCurso,laboratorio_idLaboratorio,tipoReserva_idtipoReserva) VALUES (?,?,?,?)");
		$sql->execute(array($res->idUsuario,$res->idCurso,$res->idLaboratorio,$res->idTipoReserva));
	}
	
	public function Get($idReserva)
	{
		$sql = $this->conn->prepare("select * from reserva where idReserva = ?");
		$sql->execute(array($idReserva));
		return $sql->fetch(PDO::FETCH_OBJ);
	}
	
	public function Actualizar($res)
	{
		$sql= $this->conn->prepare("update reserva set idUsuario = ?, idBloque=?, idCurso=?, idLaboratorio=? where idReserva = ?");

		$sql->execute(
			array($res->idUsuario,$res->idBloque,$res->idCurso,$res->idLaboratorio,$res->idReserva)
		);
	}

	public function ListarCursos()
	{
		
		$sql = $this->conn->prepare("SELECT * FROM curso");
		$sql->execute();
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function ListarTiposDeReserva()
	{
		
		$sql = $this->conn->prepare("SELECT * FROM tiporeserva");
		$sql->execute();
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarLaboratorios()
	{
		
		$sql = $this->conn->prepare("SELECT * FROM laboratorio");
		$sql->execute();
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	public function ListarEspecificos($fecha, $tipojornada)
	{
		$sql = $this->conn->prepare("SELECT * FROM bloque where fecha = ? AND tipojornada = ? AND disponible = 1");
		$sql->execute(array($fecha, $tipojornada));
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}

	public function GetLast()
		{
			$sql = $this->conn->prepare("SELECT * FROM `reserva` WHERE idReserva = (SELECT max(idReserva) FROM reserva);");
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}


	public function ModificarBloque($blo)
	{
		$sql= $this->conn->prepare("UPDATE bloque SET disponible = 0, reserva_idReserva = ? where idBloque = ?");
		$sql->execute(array($blo->reserva_idReserva,$blo->idBloque));
	}

	public function Delete($idReserva)
	{
		//Parte 1: Se cambia el estado del bloque disponible (shi sheñooool)
		$sql = $this->conn->prepare("UPDATE bloque SET disponible = 1 where reserva_idReserva = ?");
		$sql->execute(array($idReserva));
		//Parte 1.5: Anular la wea por la reconchasumadre para que se pueda borrar AAAAAAAAAAAAAA
		$sql = $this->conn->prepare("UPDATE bloque SET reserva_idReserva = NULL where reserva_idReserva = ?");
		$sql->execute(array($idReserva));
		//Parte 2: Se borra la reserva culiá
		$sql = $this->conn->prepare("DELETE FROM reserva where idReserva = ?");
		$sql->execute(array($idReserva));
	}

	public function Ver($idReserva)
	{
		$sql = $this->conn->prepare("select * from reserva where idReserva = ?");
		$sql->execute(array($idReserva));
		return $sql->fetch(PDO::FETCH_OBJ);
	}




}
?>