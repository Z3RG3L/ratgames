<?php

if (isset($_REQUEST["acc"]) && isset($_GET["cvecat"])) {
    include("conexion.php");
    $sql = "update categoria set activo = 0 where md5(cve_cat) = '" . $_GET["cvecat"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='categorialst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {

    if (isset($_GET["cvecat"])) {

        if (!isset($_REQUEST["nom_cat"])) {
            echo "<script>alert('Ingresando datos...');window.open('categoria.php');</script>";
        }

        $nomcat = $_REQUEST["nom_cat"];
        $prefijocat = $_REQUEST["prefijo"];

        if (!isset($_REQUEST["activo"])) {
            $activocat = "0";
        } else {
            $activocat = "1";
        }


        include("conexion.php");

        $sql = "update categoria set nom_cat = '$nomcat', prefijo='$prefijocat', activo = '$activocat' where md5(cve_cat) = '" . $_GET["cvecat"] . "'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='categorialst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {

        if (!isset($_REQUEST["nom_cat"])) {
            echo "<script>alert('Error al recibir los datos');window.open('categoria.php');</script>";
        }

        $nomcat = $_REQUEST["nom_cat"];
        $prefijocat = $_REQUEST["prefijo"];

        if (!isset($_REQUEST["activo"])) {
            $activocat = "0";
        } else {
            $activocat = "1";
        }

        include("conexion.php");

        $sql = "insert into categoria (nom_cat, activo, prefijo) values('" . $nomcat . "','" . $activocat . "','" . $prefijocat . "');";
		// die($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='categorialst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

?>