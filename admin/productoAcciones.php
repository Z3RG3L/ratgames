<?php

if (isset($_REQUEST["acc"]) && isset($_GET["idpro"])) {
    include("conexion.php");
    $sql = "update producto set activo = 0 where md5(id_pro) = '" . $_GET["idpro"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='productolst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {

    if (isset($_GET["idpro"])) {

        if (!isset($_REQUEST["nom_pro"])) {
            echo "<script>alert('Error al recibir los datos');window.open('producto.php');</script>";
        }

        $nompro = $_REQUEST["nom_pro"];
        $costpro = $_REQUEST["cto_pro"];
        $precpro = $_REQUEST["prec_pro"];
        $imgpro = $_REQUEST["img_prod"];
      

        if (!isset($_REQUEST["activo"])) {
            $activopro = "0";
        } else {
            $activopro = "1";
        }


        include("conexion.php");

        $sql = "update producto set nom_pro = '$nompro', cto_pro = '$costpro', prec_pro = '$precpro', img_prod='$imgpro', activo = '$activopro' where md5(id_pro) = '" . $_GET["idpro"] . "'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='productolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        if (!isset($_REQUEST["nom_cat"])) {
            echo "<script>alert('Error al recibir los datos');window.open('producto.php');</script>";
        }

        $nompro = $_REQUEST["nom_pro"];
        $costpro = $_REQUEST["cost_pro"];
        $precpro = $_REQUEST["prec_pro"];
        $imgpro = $_REQUEST["img_prod"];
        $cvecat = $_REQUEST["cve_cat"];


        if (!isset($_REQUEST["activo"])) {
            $activopro = "0";
        } else {
            $activopro = "1";
        }

        include("conexion.php");

        $sql = "update producto set nom_pro = '$nompro', cve_cat = '$cvecat', cto_pro = '$costpro', prec_pro = '$precpro', img_prod = '$imgpro',activo = '$activopro' where md5(id_pro) = '" . $_GET["cvecat"] . "'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='productolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        if (!isset($_REQUEST["nom_pro"])) {
            echo "<script>alert('Error al recibir los datos');window.open('producto.php');</script>";
        }

        $nompro = $_REQUEST["nom_pro"];
        $costpro = $_REQUEST["cost_pro"];
        $precpro = $_REQUEST["prec_pro"];
        $imgpro = $_REQUEST["img_prod"];
        $cvecat = $_REQUEST["cve_cat"];

        if (!isset($_REQUEST["activo"])) {
            $activopro = "0";
        } else {
            $activopro = "1";
        }

        include("conexion.php");

        $sql = "insert into producto (nom_pro, cto_pro, prec_pro, img_prod,activo ) values('" . $nompro . "','" . $costopro . "','" . $precpro . "','" . $imgpro . "','" . $activopro . "',);";
		// die($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='productolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

?>