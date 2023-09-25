<?php
require_once __DIR__ . '/Controller/controller.php'
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background: white;
            /* background: linear-gradient(to right, #ffa751, #ffe259); */
        }

        .bg {
            background-image: url('Asset/img/build.jpg');
            background-position: center center;
        }

        .container {
            margin: auto;
        }



        #titulo {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container w-100 bg-primary text-align-center mt-5 mb-5 rounded shadow ">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-log-5 col-xl-6 rounded">

            </div>
            <div class="col bg-white p-3 rounded-end ">
                <div class="text-center">
                    <img src="Asset/img/logoMenjalher.png" width="40%" height="40%">
                </div>
                <h2 class="fw-bold tex-center-center py-3" id="titulo">Bienvenido</h2>
                <div class="mb-4">
                    <label for="" class="form-label">Usuario</label>
                    <input type="text" class="form-control" placeholder="Ingrese el usuario" id="Usuario">
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese la contraseña" id="Pass">
                </div> <br>
                <div class="d-grid">
                    <button class="btn btn-outline-primary" onclick="enviarFormulario()">Iniciar Sesión</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<script>
    async function enviarFormulario() {
        // se declara variables
        var Usuario = $('#Usuario').val();
        var Pass = $('#Pass').val();

        // se arma el Formulario
        let formData = new FormData();
        formData.append('function', 'recibir1');
        formData.append('Usuario', Usuario);
        formData.append('pass', Pass);

        // se realiza la peticion
        try {
            let req2 = await fetch("Controller/controller.php", {
                method: "POST",
                body: formData,
            });
            let res2 = await req2.text();
            if (res2==='OK') {
                window.location.replace("http://localhost/SistemaRiesgo/View/dashboard.php");
            }
            alert(res2);
            console.log(res2);
        } catch {
            console.log(error);
        }
    }
</script>

</html>