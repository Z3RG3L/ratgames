<?php
session_start();

if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
}

include("conexion.php");

$sql = "select nom_usu,id_usuario, contr_usu , tipo_usu from usuario where upper(nom_usu) = '" . strtoupper($usuario) . "';";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {

        if ($pass == $row["contr_usu"]) {

            if ($row["tipo_usu"] > 0) {
                $_SESSION["sIdusuario"] = md5($row["id_usuario"]);
                $_SESSION["nomcliente"] = $row["nom_usu"];
                $carrito = array();
                $_SESSION["sCarrito"] = $carrito;
                echo ("<script>window.location.href='../index.php';</script>");


            } else {

                $_SESSION["nomusuario"] = "Administrador: " . $row["nom_usu"];
                echo ("<script>alert('Bienvenido Brou');window.location.href='dashboard.php';</script>");

                //header("location:dashboard.php");
            }
        } else {
            echo ("<script>alert('Eres medio Brou, contraseña incorrecta');window.location.href='index.php';</script>");
        }
    }
} else {
    echo ("<script>alert('Tu no eres Brou, usuario incorrecto');window.location.href='index.php';</script>");
}
$conn->close();





