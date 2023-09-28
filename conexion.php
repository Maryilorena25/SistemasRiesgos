<?php
class conexionBD
{
    function conectarM()
    {
		//$serverName='52.117.172.99\SQLDISCOL';
		$serverName='213.255.227.137';
        //$serverName = "52.117.172.99, 1433";
        $connectionInfo = array("Database" => "Menjalher", "UID" => "sa", "PWD" => "Mantis321", "CharacterSet" => "UTF-8");
        $conn = sqlsrv_connect($serverName, $connectionInfo);
        if ($conn) {
            return $conn;
        } else {
            return 1;
        }
    }
    function conectar()
    {

        $host = "213.255.227.137";
        $user = "user1";
        $pwd = "Discol159+*";
        $bd = "menjalher";

        $con = mysqli_connect($host, $user, $pwd, $bd) or die("Error al conectar a la base de Datos");
        mysqli_set_charset($con, 'utf8');
        return $con;
    }

    public function validarUsu($val, $usuario, $con2)
    {
        switch ($val) {
            case 1: //insertar usuario
                $consulta = "INSERT INTO G_proyectos (doc_usuario, estado_usuario) VALUES ('" . $usuario . "', 1);";
                break;
            case 2: //Consultar usuario
                $consulta = "select mp_usuarios where doc_usuario='" . $usuario;
                break;
        }
        return mysqli_query($con2, $consulta);
    }
    
    public static function sqlmenjhaler(){
		$x = new PDO("sqlsrv:Server=213.255.227.137;Database=Menjalher;","Consultas","Consultas321");
		$x->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $x;
	}
}
