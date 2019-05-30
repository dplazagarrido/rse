<?php

class BaseDatos {

    var $conn;
    var $host;
    var $user;
    var $password;
    var $database;

    function BaseDatos() {
        $this->host = "localhost";
        $this->database = "rse";
        $this->user = "root";
        $this->password = "";
    }

    function Conectar() {
        if (!($con = mysqli_connect($this->host, $this->user, $this->password, $this->database))) {
            echo "Error al conectar";
            exit();
        }
        $this->conn = $con;
        return true;
    }

    function Ejecutar($sql) {
        return $this->conn->query($sql);
    }

    function Cerrar() {
        return $this->conn->close();
    }

}

?>
