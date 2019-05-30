<?php

require_once '../data/conexion.class.php';

class Login
{
	
	
	var $conn;
    var $cuenta;
    var $password;

    function Login() {
        $this->conn = new BaseDatos();
    }

    function ValidaAcceso() {
        if ($this->conn->Conectar() == true) {
            $sql = "SELECT *";
            $sql .= "FROM usuario ";
            $sql .= "WHERE cuenta = '" . $this->cuenta . "' ";
            $sql .= "AND password = '" . $this->password . "' ";
            $rs = $this->conn->Ejecutar($sql);
            $this->conn->Cerrar();
            return $rs;
        }
    }
	

	
}
?>