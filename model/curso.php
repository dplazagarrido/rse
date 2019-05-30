<?php
class Curso
{
	//variable de conección
	private $conn;
	
	//atributos de la tabla
	public $idCurso;
	public $nombre;
	public $grado;
	public $cantidadAlumnos;

	
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

	public function Listar()
	{
		
		$sql = $this->conn->prepare("SELECT * FROM curso");
		$sql->execute();
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function Insert($cur)
	{
		$sql = $this->conn->prepare("INSERT INTO curso (nombre,grado,cantidadAlumnos) VALUES (?,?,?)");
		$sql->execute(array($cur->nombre,$cur->grado,$cur->cantidadAlumnos));
		
	}
	
	public function Get($idCurso)
	{
		$sql = $this->conn->prepare("select * from curso where idCurso = ?");
		$sql->execute(array($idCurso));
		
		return $sql->fetch(PDO::FETCH_OBJ);
		
	}
	
	
	public function Actualizar($cur)
	{
		$sql= $this->conn->prepare("update curso set nombre = ?, grado=?, cantidadAlumnos=? where idCurso = ?");
		$sql->execute(array($cur->nombre,$cur->grado,$cur->cantidadAlumnos, $cur->idCurso));
			
		
		
	}
	
	public function Delete($idCurso)
	{
		$sql = $this->conn->prepare("DELETE FROM curso where idCurso = ?");
		$sql->execute(array($idCurso));
	}
	
}
?>