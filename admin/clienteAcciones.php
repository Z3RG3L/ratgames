<?php

if (isset($_REQUEST["acc"]) && isset($_GET["id_clie"])) {
    include("conexion.php");
    $sql = "update cliente set activo = 0 where md5(id_clie) = '" . $_GET["id_clie"] . "'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='clientelst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {

    if (isset($_GET["id_clie"])) {

        if (!isset($_REQUEST["nom_clie"])) {
            echo "<script>alert('Ingresando datos...');window.open('categoria.php');</script>";
        }

        $nom_clie = $_REQUEST["nom_clie"];
        $ap_clie = $_REQUEST["ap_clie"];
        $am_clie = $_REQUEST["am_clie"];
        $cel_clie = $_REQUEST["cel_clie"];
        $calle_clie = $_REQUEST["calle_clie"];
        $cp_clie = $_REQUEST["cp_clie"];
        $ni_clie = $_REQUEST["ni_clie"];
        $ne_clie = $_REQUEST["ne_clie"];
        $col_clie = $_REQUEST["col_clie"];
        $rfc_clie = $_REQUEST["rfc_clie"];
        $cve_mun = $_REQUEST["cve_mun"];
        $nom_usu = $_REQUEST["nom_usu"];
        $correo_clie = $_REQUEST["correo_clie"];
        $activo = $_REQUEST["activo"];
       
        

        if (!isset($_REQUEST["activo"])) {
            $activo_clie = "0";
        } else {
            $activo_clie = "1";
        }


        include("conexion.php");

        $sql = "update cliente set nom_clie = '$nom_clie', ap_clie = '$ap_clie', am_clie = '$am_clie', cel_clie = '$cel_clie', calle_clie = '$calle_clie', calle_clie = '$calle_clie', cp_clie = '$cp_clie', ni_clie = '$ni_clie', ne_clie = '$ne_clie', col_clie = '$col_clie', rfc_clie = '$rfc_clie', cve_mun = '$cve_mun', nom_usu = '$nom_usu', correo_clie = '$correo_clie', activo = '$activo_clie' where md5(id_clie) = '" . $_GET["id_clie"] . "'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='clientelst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {

        if (!isset($_REQUEST["nom_clie"])) {
            echo "<script>alert('Error al recibir los datos');window.open('cliente.php');</script>";
        }

       
        $nom_clie = $_REQUEST["nom_clie"];
        $ap_clie = $_REQUEST["ap_clie"];
        $am_clie = $_REQUEST["am_clie"];
        $cel_clie = $_REQUEST["cel_clie"];
        $calle_clie = $_REQUEST["calle_clie"];
        $cp_clie = $_REQUEST["cp_clie"];
        $ni_clie = $_REQUEST["ni_clie"];
        $ne_clie = $_REQUEST["ne_clie"];
        $col_clie = $_REQUEST["col_clie"];
        $rfc_clie = $_REQUEST["rfc_clie"];
        $cve_mun = $_REQUEST["cve_mun"];
        $nom_usu = $_REQUEST["nom_usu"];
        $correo_clie = $_REQUEST["correo_clie"];
        $activo = $_REQUEST["activo"];

        if (!isset($_REQUEST["activo"])) {
            $activo_clie = "0";
        } else {
            $activo_clie = "1";
        }

        include("conexion.php");

        $sql = "insert into cliente (nom_clie, ap_clie, am_clie, cel_clie, calle_clie, cp_clie, ni_clie, ne_clie, col_clie, rfc_clie, cve_mun, nom_usu, correo_clie, activo) values('" . $nom_clie . "','" . $ap_clie . "','" . $am_clie . "','" . $cel_clie . "','" . $calle_clie . "','" . $cp_clie . "','" . $ni_clie . "','" . $ne_clie . "','" . $col_clie . "','" . $rfc_clie . "','" . $cve_mun . "','" . $nom_usu . "','" . $correo_clie . "','" . $activo_clie . "');";
		// die($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='clientelst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

?>