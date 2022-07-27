<?php


if (!isset($_REQUEST["nom_usu"])) {
    echo "<script>alert('Ingresando los datos...');window.open('.php');</script>";
}
$nomusu = $_REQUEST["nom_usu"];
$contrusu = $_REQUEST["contr_usu"];
$pregusu = $_REQUEST["pregunta_usu"];
      
include("conexion.php");

$sql="INSERT INTO usuario VALUES ('$nomusu','$contrusu','$pregusu')";



if ($conn->query($sql) === TRUE) {
    echo "<script>window.location.href='';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

