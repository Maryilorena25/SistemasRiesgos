<?php

class Modelo {

    private $dbHost = "127.0.0.1";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "sistema_riesgos";

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPassword);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function iniciar ($Usuario, $Contrasenia){
        $sql = "SELECT * FROM `usuarios` WHERE user='$Usuario' and pass='$Contrasenia'";
        $sql = $this->conn->prepare($sql);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_NAMED);
        return $row;
    }
}

?>