<?php
session_start();

if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
}

include("./admin/conexion.php");

$sql = "select nom_usu, contr_usu from usuario where nom_usu = '$usuario' and contr_usu = aes_encrypt('$pass','gatito')";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
   
    while ($row = $result->fetch_assoc()) {
        
            $_SESSION["sNom_usu"] = md5($row["nom_usu"]);
            $_SESSION["nomusuario"] = "@" . $row["nom_usu"];
            $carrito = array();
            $_SESSION["sCarrito"] = $carrito;
            echo ("<script>alert('Bienvenido $usuario');window.location.href='index.php';</script>");

            //header("location:dashboard.php");
    }
}else{
    echo ("<script>alert('Contraseña o usuario incorrectos');window.location.href='principal.php';</script>");

}
$conn->close();
