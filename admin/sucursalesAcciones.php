<?php

if (isset($_REQUEST["acc"]) && isset($_GET["sucursal"])) {
    include("conexion.php");
    $sql = "update sucursal set activo = 0 where id_suc = '" . $_GET["sucursal"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='sucursaleslst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {

    if (isset($_GET["sucursal"])) {

        if (!isset($_REQUEST["nombre"])) {
            echo "<script>alert('Error al recibir los datos');window.open('sucursal.php');</script>";
        }
        
        $sucursal = $_REQUEST["sucursal"];
        $nombre = $_REQUEST["nombre"];
        $telefono = $_REQUEST["telefono"];
        $calle = $_REQUEST["calle"];
        $cp = $_REQUEST["cp"];
        $ni = $_REQUEST["ni"];
        $ne = $_REQUEST["ne"];
        $col = $_REQUEST["col"];
        $cveMun = $_REQUEST["cveMun"];

        
        if (!isset($_REQUEST["activo"])) {
            $activo = "0";
        } else {
            $activo = "1";
        }


        include("conexion.php");

        $sql = "update sucursal set nom_suc = '$nombre', tel_suc='$telefono',calle_suc='$calle',cp_suc='$cp',ni_suc='$ni',ne_suc='$ne',col_suc='$col',cve_mun='$cveMun', activo = '$activo' where (id_suc) = '" . $_GET["sucursal"] . "'";
 

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='sucursaleslst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {

        if (!isset($_REQUEST["sucursal"])) {
            echo "<script>alert('Error al recibir los datos');window.open('sucursal.php');</script>";
        }

        $sucursal = $_REQUEST["sucursal"];
        $nombre = $_REQUEST["nombre"];
        $telefono = $_REQUEST["telefono"];
        $calle = $_REQUEST["calle"];
        $cp = $_REQUEST["cp"];
        $ni = $_REQUEST["ni"];
        $ne = $_REQUEST["ne"];
        $col = $_REQUEST["col"];
        $cveMun = $_REQUEST["cveMun"];
        if (!isset($_REQUEST["nombre"])) {
            echo "<script>alert('Error al recibir los datos');window.open('sucursal.php');</script>";
        }




        if (!isset($_REQUEST["activo"])) {
            $activo = "0";
        } else {
            $activo = "1";
        }


        include("conexion.php");

        $sql = "insert into sucursal(id_suc, nom_suc,tel_suc,calle_suc,cp_suc,ni_suc,ne_suc,col_suc,cve_mun, activo) values('" . 0 . "', '" . $nombre . "', '" . $telefono . "', '" . $calle . "', '" . $cp . "', '" . $ni . "', '" . $ne . "', '" . $col . "', '" . $cveMun . "', '" . $activo . "')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='sucursaleslst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}