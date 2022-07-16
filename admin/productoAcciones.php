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

} 

else {

    if (isset($_GET["idpro"])) {
       if (!isset($_REQUEST["id_pro"])) {
            echo "<script>alert('Ingresando datos...');window.open('producto.php');</script>";
        }
        $nompro = $_REQUEST["nom_pro"];
        $precpro = $_REQUEST["prec_pro"];
        $cvecat = $_REQUEST["cve_cat"];
        $ctopro = $_REQUEST["cto_pro"];
        $imgpro = $_REQUEST["img_prod"];
        $activopro = $_REQUEST["activo"];
        $prefijopro = $_REQUEST["prefijo"];

        if (!isset($_REQUEST["activo"])) {
            $activopro = "0";
        } else {
            $activopro = "1";
        }
        include("conexion.php");
        $sql = "update producto set nom_pro='$nompro', prec_pro='$precpro', cve_cat='$cvecat', cto_pro='$ctopro', img_prod='$imgpro', prefijo='$prefijopro', activo='$activopro' where md5(id_pro) = '" . $_GET["idpro"] . "'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='productolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {

        if (!isset($_REQUEST["idpro"])) {
            echo "<script>alert('Ingresando los datos...');window.open('producto.php');</script>";
        }
        $nompro = $_REQUEST["nom_pro"];
        $precpro = $_REQUEST["prec_pro"];
        $cvecat = $_REQUEST["cve_cat"];
        $ctopro = $_REQUEST["cto_pro"];
        $imgpro = $_REQUEST["img_prod"];
        $activopro = $_REQUEST["activo"];
        $prefijopro = $_REQUEST["prefijo"];

        if (!isset($_REQUEST["activo"])) {
            $activopro = "0";
        } else {
            $activopro = "1";
        }

        include("conexion.php");

        $sql = "insert into producto (nom_pro, prec_pro, cve_cat, cto_pro, img_prod, activo, prefijo) values('" . $nompro . "','" . $precpro . "','" . $cvecat . "','" . $ctopro . "','" . $imgpro . "','" . $activopro . "','" . $prefijopro . "');";
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