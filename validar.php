<?php

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

require_once("conexion.php");
$con = new conexionBD();
$con1 = $con->conectarM();
$con2 = $con->conectar();
if ($con1 == 1) {
    echo '<script language="javascript">alert("No se pudo establecer Conexion con la base de datos");window.location.href="index.php"</script>';
    die();
}
$usuario = stripcslashes($usuario);
$clave = stripcslashes($clave);

$consulta = "SELECT TOP(1) T1.UsuNom, T1.UsuCod, T1.UsuCla, T1.PerUsuCod, T1.UsuEst, T2.NitIde, T3.UsuSubSucCod FROM Usuarios T1 
            LEFT JOIN Nit T2 ON T1.NitSec = T2.NitSec
            LEFT JOIN Usuariossucursales T3 ON T1.UsuCod = T3.UsuCod WHERE T1.UsuCod LIKE '$usuario' AND T1.UsuCla LIKE '$clave'";
//var_dump($consulta);

$param = array($usuario, $clave);
$resultado = sqlsrv_query($con1, $consulta);
$datos = sqlsrv_fetch_array($resultado);
$row_count = sqlsrv_num_rows($resultado);
if ($datos <> NULL) {
    if ($datos["UsuEst"] <> "A") {
        echo '<script language="javascript">alert("Usuario Inactivo");window.location.href="/"</script>';
        die();
    }
    $ok = 1;
    sqlsrv_close($con1);
} else {
    sqlsrv_close($con1);
    echo '<script language="javascript">alert("Usuario o clave invalida");window.location.href="/"</script>';
    die();
}

$usuario = mysqli_real_escape_string($con2, $usuario);
$clave = mysqli_real_escape_string($con2, $clave);
$consultaVal = "Select * from g_proyectos where doc_usuario = '" . $usuario . "'";
$resultadoVal = mysqli_query($con2, $consultaVal);
if (!$resultadoVal) {
    echo 'Error en la consulta';
}
$datosVal = mysqli_fetch_array($resultadoVal);

if (mysqli_num_rows($resultadoVal) > 0) {
    if ($datosVal['estado_usuario'] == 0) {
        echo '<script language="javascript">alert("Aun no ha sido activado por el Administrador");window.location.href="/"</script>';
    } else {
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre_usuario'] = $datos["UsuNom"];
        $_SESSION['UsuCod'] = $datos['UsuCod'];
        $_SESSION['PerUsuCod']=$datos['PerUsuCod'];
        $_SESSION['NitIde'] = $datos['NitIde'];
        $_SESSION['UsuSubSucCod'] = $datos['UsuSubSucCod'];
        echo '<script language="javascript">alert("Bienvenido");window.location.href="principal.php"</script>';
    }
    die;
} else {
    $inserta = $con->validarUsu(1, $usuario, $con2);
    if ($inserta) {
        echo '<script language="javascript">alert("Insertado OK")</script>';
        if ($ok == 1) {
            echo '<script language="javascript">alert("Registrado OK, por favor informar para activacion de permisos");window.location.href="/"</script>';
        }
    } else {
        echo 'ERROR AL INSERTAR ' . $inserta . mysqli_error($con2);
    }
}
