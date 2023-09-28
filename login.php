<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/EmpHolding/proyectos/SistemaRiesgo/Model/modelo.php';
$MODEL = new modelo();

if ($_POST) {
    $user = $_POST['Usuario'];
    $pass = $_POST['pass'];
    $consulta = $MODEL->iniciar($user, $pass);
    //validacion 
    if (empty($consulta)) {
        echo '<script> alert("Credenciales Incorrectas")</script>';
    } else {
        echo '<script>  window.location.href = "http://213.255.227.137:8585/EmpHolding/proyectoS/SistemaRiesgo/View/dashboard.php"; </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600' rel='stylesheet' type='text/css'>
    <!-- alertas -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./Asset/styles/login.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="back">
        <canvas id="canvas" class="canvas-back"></canvas>
        <div class="backRight"> </div>
        <div class="backLeft"> </div>
    </div>
    <div id="slideBox">
        <div class="topLayer">
            <div class="left">
            </div>
            <div class="right">
                <div class="content">
                    <div class="text-center" style="margin: top 10px;">
                        <img src="Asset/img/logoMenjalher.png" width="20%" height="20%" style="display: block; margin: 0 auto;">
                    </div>
                    <br> <br>
                    <form action="#" method="post">
                        <h2>Inicar Sesión</h2>
                        <!-- <form id="form-login" method="post" onsubmit="return false;"> -->
                        <div class="form-element form-stack">
                            <label for="username-login" class="form-label">Usuario</label>
                            <br>
                            <input type="text" name="Usuario" placeholder="Ingrese el usuario" id="Usuario">
                        </div>
                        <div class="form-element form-stack">
                            <label for="password-login" class="form-label">Contraseña</label>
                            <br>
                            <input type="password" name="pass" placeholder="Ingrese la contraseña" id="Pass">
                        </div>
                        <div class="form-element form-submit">
                            <button id="logIn" class="login" type="submit" name="login">Inicar Sesión</button>
                        </div>
                    </form>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.11.3/paper-full.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <script src="./Asset/js//login.js"></script>


    <script>
    </script>
</body>

</html>