<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SistemaRiesgo/Model/modelo.php';

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new Modelo();
    }
    public function iniciar()
    {
        //consulta de la busqueda
        $user = $_POST['Usuario'];
        $pass = $_POST['pass'];
        $consulta = $this->MODEL->iniciar($user, $pass);

        //validacion 
        if (empty($consulta)) {
            echo 'Credenciales Incorrectas';
        } else {
            echo 'OK';
        }
    }
}
$Controller = new Controller;

if (isset($_POST['function'])) {
    call_user_func(array(new Controller, $_POST['function']));
}
