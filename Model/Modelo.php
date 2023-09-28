<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/EmpHolding/conexion.php';
//Conexion a la base de datos y consultas
class Modelo
{

    public $CNX1;

    public function __construct()
    {
        $this->CNX1 = conexionBD::sqlmenjhaler();
    }
    public function iniciar($Usuario, $Contrasenia)
    {
        $sql = "SELECT * FROM usuarios WHERE UsuCod='$Usuario' and UsuCla='$Contrasenia'";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchall(PDO::FETCH_NAMED);
        return $row;
    }
}
?>