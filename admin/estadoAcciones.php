<?php

if (isset($_REQUEST["acc"]) && isset($_GET["cveest"])) {
    include("conexion.php");
    $sql = "update estado set activo = 0 where md5(cve_est) = '" . $_GET["cveest"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='estadolst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {

    if (isset($_GET["cveest"])) {

        if (!isset($_REQUEST["nom_est"])) {
            echo "<script>alert('Error al recibir los datos');window.open('estado.php');</script>";
        }

        $nomest = $_REQUEST["nom_est"];
        $prefijoest = $_REQUEST["prefijo"];

        if (!isset($_REQUEST["activo"])) {
            $activoest = "0";
        } else {
            $activoest = "1";
        }


        include("conexion.php");

        $sql = "update estado set nom_est = '$nomest', prefijo='$prefijoest', activo = '$activoest' where md5(cve_est) = '" . $_GET["cveest"] . "'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='estadolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {

        if (!isset($_REQUEST["nom_est"])) {
            echo "<script>alert('Error al recibir los datos');window.open('estado.php');</script>";
        }

        $nomest = $_REQUEST["nom_est"];
        $prefijoest = $_REQUEST["prefijo"];

        if (!isset($_REQUEST["activo"])) {
            $activoest = "0";
        } else {
            $activoest = "1";
        }

        include("conexion.php");

        $sql = "insert into estado (nom_est, activo, prefijo) values('" . $nomest . "','" . $activoest . "','" . $prefijoest . "');";
		// die($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='estadolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

?>