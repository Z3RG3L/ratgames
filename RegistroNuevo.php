<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>

<!--HEADER-->
<?php
    include ("encabezado.php");
?>
<!--/HEADER-->

<div id="login">
    <h3 class="text-center text-white pt-5">REGISTRO DE USUARIO NUEVO</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">REGISTRO DE USUARIO</h3>

                        <div class="row gx-4 gx-lg-5 row-cols-3 justify-content-center">

                        <div class="form-group">
                            <label for="password" class="text-info">Nombre:</label><br>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Nombre">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Apellido Paterno:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Apellido Materno:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info"> Telefono:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Calle:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Colonia:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="password" class="text-info">RFC:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Municipio:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Correo Electronico:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="username" class="text-info">Nombre de usuario:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Contraseña:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="password" class="text-info">Confirmar contraseña:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        </div>


                        <div class="form-group">
                            <input href="RegistroNuevo.php" type="Registrar" name="Registrar" class="btn btn-info btn-md" value="Registrar">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>