<?php
class Usuario
{
	//variable de conección
	private $conn;
	
	//atributos de la tabla
	public $idUsuario;
	public $tipoUsuario_idtipoUsuario;
	public $nombreCompleto;
	public $apellidoPaterno;
	public $apellidoMaterno;
	public $fecnac;
	public $especialidad;
	public $cuenta;
	public $password;

	
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
		
		$sql = $this->conn->prepare("SELECT u.*, es.Descripcion descripcion FROM usuario AS u 
			JOIN especialidad AS es ON es.idEspecialidad = u.especialidad WHERE u.tipoUsuario_idtipoUsuario = 3;");
		$sql->execute();
		
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function ListarEspecialidad()
	{
		$sql = $this->conn->prepare("SELECT * FROM especialidad");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function Insert($usu)
	{
		$sql = $this->conn->prepare("INSERT INTO usuario (nombreCompleto,apellidoPaterno,apellidoMaterno,cuenta, password, correoElectronico,especialidad) VALUES (?,?,?,?,?,?,?)");
		$sql->execute(array($usu->nombreCompleto,$usu->apellidoPaterno,$usu->apellidoMaterno,$usu->cuenta,$usu->password,$usu->correoElectronico,$usu->especialidad));
		
	}
	
	public function Get($idUsuario)
	{
		$sql = $this->conn->prepare("select * from usuario where idUsuario = ?");
		$sql->execute(array($idUsuario));
		
		return $sql->fetch(PDO::FETCH_OBJ);
		
	}
	
	
	public function Actualizar($usu)
	{
		$sql= $this->conn->prepare("update usuario set  nombreCompleto = ?,apellidoPaterno = ?, apellidoMaterno = ?, correoElectronico =?, especialidad=?, cuenta=?, password=? where idUsuario = ?");
		$sql->execute(array($usu->nombreCompleto,$usu->apellidoPaterno,$usu->apellidoMaterno,$usu->correoElectronico,$usu->especialidad,$usu->cuenta,$usu->password,$usu->idUsuario));
			
		
		
	}
	
	public function Delete($idUsuario)
	{
		$sql = $this->conn->prepare("DELETE FROM usuario where idUsuario = ?");
		$sql->execute(array($idUsuario));
	}
	
}
?>