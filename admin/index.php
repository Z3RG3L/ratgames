<?php
session_start();
unset($_SESSION['nomusuario']);
session_destroy();
?>
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

<body style="background-color:black" class="hold-transition login-page">
            <div class="login-box">
            <!-- /.login-logo -->
            <div body style="background-color:white" class="card card-outline card-primary">
                <div class="card-header text-center">
                <img src="https://images.emojiterra.com/google/android-11/512px/1f400.png" height=100 width=100>
                    <a href="./index2.html" class="h1"><b>RAT GAMES</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">INICIO DE SESIÓN</p>

                    <form action="validau.php" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre de usuario">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block" style="margin-left: 110%;">Iniciar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

        <!-- /.login-box -->
        </div>
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
</body>

</html>