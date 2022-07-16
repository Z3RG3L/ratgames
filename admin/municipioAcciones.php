<?php
if (isset($_REQUEST["acc"]) =="elimina") {
    include ("conexion.php");
    $sql= "update municipio set activo = 0 where cve_mun ='".$_GET["cvemun"]."'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='municipiolst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

else{
    if (isset($_GET["cve_mun"])){
        if (!isset($_REQUEST["nom_mun"])) {
            echo "<script>alert('error al recibir los datos');window.open('municipio.php');</script>";
        }
        $cve_mun = $_REQUEST["cve_mun"];
        $nom_mun =$_REQUEST["nom_mun"];
        $prefijomun = $row["prefijo"];
        $activomun = $row["activo"];
        include("../conexion.php");
        $sql = "update sucursal set cve_mun='$cve_mun', nom_mun='$nom_mun'
                    ,prefijo='$prefijomun',activo='$activomun'
                where md5(cve_mun)= '".$_GET["cve_mun"]."'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='municipiolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    else{
        if (!isset($_REQUEST["nom_mun"])) {

            echo "<script>alert('error al recibir los datos');window.open('municipio.php');</script>";
        }
        $cve_mun = $_REQUEST["cve_mun"];
        $nom_mun =$_REQUEST["nom_mun"];
        $prefijomun = $row["prefijo"];
        $activomun = $row["activo"];

        include("../conexion.php");
        $sql = "insert into municipio (cve_mun,nom_mun,prefijo,activo)
values('" . $cve_mun . "','" . $nom_mun . "','".$activomun ."','" .  $prefijomun . "')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='municipiolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>