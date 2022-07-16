<?php

if (isset($_REQUEST["acc"]) && isset($_GET["cvemun"])) {
    include("conexion.php");
    $sql = "update municipio set activo = 0 where md5(cve_mun) = '" . $_GET["cvemun"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='municipiolst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {

    if (isset($_GET["cvemun"])) {

        if (!isset($_REQUEST["nom_mun"])) {
            echo "<script>alert('Ingresando datos...');window.open('categoria.php');</script>";
        }

        $nommun = $_REQUEST["nom_mun"];
        $prefijomun = $_REQUEST["prefijo"];
        $cveest = $_REQUEST["cve_est"];

        if (!isset($_REQUEST["activo"])) {
            $activomun = "0";
        } else {
            $activomun = "1";
        }


        include("conexion.php");

        $sql = "update municipio set nom_mun = '$nommun', prefijo='$prefijomun', activo = '$activomun', cve_est = '$cveest' where md5(cve_mun) = '" . $_GET["cvemun"] . "'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='municipiolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {

        if (!isset($_REQUEST["nom_mun"])) {
            echo "<script>alert('Ingresando datos...');window.open('municipio.php');</script>";
        }

        $nommun = $_REQUEST["nom_mun"];
        $prefijomun = $_REQUEST["prefijo"];
        $cveest = $_REQUEST["cve_est"];

        if (!isset($_REQUEST["activo"])) {
            $activomun = "0";
        } else {
            $activomun = "1";
        }

        include("conexion.php");

        $sql = "insert into municipio (nom_mun, activo, prefijo, cve_est) values('" . $nommun . "','" . $activomun . "','" . $prefijomun . "','" . $cveest . "');";
		// die($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='municipiolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

?>