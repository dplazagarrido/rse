<?php


require_once '../model/login.php';

class LoginController
{
	
	var $db;

    function LoginController() {
        $this->db = new Login();
    }

    function ValidaAcceso($cuenta, $password) {
        $this->db->cuenta = $cuenta;
        $this->db->password = $password;
        $result = $this->db->ValidaAcceso();
        while ($fila = mysqli_fetch_assoc($result)) {
            $data[] = $fila;
        }

        return $data;
    }
	
}
?>