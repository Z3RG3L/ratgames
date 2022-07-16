<?php
session_start();

if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
}

include("conexion.php");

$sql = "select nom_usu, contr_usu from usuario where nom_usu = '$usuario';";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
   
    while ($row = $result->fetch_assoc()) {
        
        if ($pass == $row["contr_usu"]) {
            $_SESSION["nomusuario"] = "Administrador: " . $row["nom_usu"];
            echo ("<script>alert('Bienvenido Brou');window.location.href='dashboard.php';</script>");

            //header("location:dashboard.php");
        } else {
            echo ("<script>alert('Eres medio Brou, contraseña incorrecta');window.location.href='index.php';</script>");
        }
    }
} else {
    echo ("<script>alert('Tu no eres Brou, usuario incorrecto');window.location.href='index.php';</script>");
}
$conn->close();