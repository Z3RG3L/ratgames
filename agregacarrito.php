<?php
session_start();
if (!isset($_SESSION["sCarrito"])) {
    echo ("<script>alert('Para usar el carrito deberá iniciar sesión');window.location.href='index.php';</script>");
}

$carrito = $_SESSION["sCarrito"];

$inventario = 0;
$idproducto = 0;
include("./admin/conexion.php");
$where = "";
if (isset($_GET["idp"])) {
    $where = "p.idproducto = " . $_GET["idp"];
} else {
    $where = "md5(p.idproducto) = '" . $_GET["idprod"] . "'";
}
$sql = "select i.idproducto, i.cantidad from producto as p inner join inventario as i on p.idproducto = i.idproducto where " . $where;
echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $inventario = $row["cantidad"];
        $idproducto = $row["idproducto"];
    }
}
$conn->close();

if (isset($_GET["idp"]) ||  isset($_GET["idprod"])) {
    if (isset($_GET["cant"])) {
        //die("si");
        $idprod = $_GET["idprod"];
        $valor = $_GET["cant"];

        foreach ($carrito as $x => $x_value) {
            var_dump($carrito);
            echo md5($x) . "-" .  $_GET["idprod"];

            if (md5($x) == $_GET["idprod"]) {

                if (($valor + $x_value) <= $inventario) {
                    $valor += $x_value;
                } else {
                    $valor = $x_value;
                    echo ("<script>alert('Lo sentimos, no tenemos más producto en existencias');window.location.href='index.php';</script>");
                }
            }
        }

        unset($carrito[$idproducto]);
        $carrito += array($idproducto => $valor);
        $_SESSION["sCarrito"] = $carrito;
        echo ("<script>window.location.href='index.php';</script>");
    } else {
        $valor = 1;

        foreach ($carrito as $x => $x_value) {
            if ($x == $_GET["idp"]) {
                if (($valor + $x_value) <= $inventario) {
                    $valor += $x_value;
                } else {
                    $valor = $x_value;
                    echo ("<script>alert('Lo sentimos, no tenemos más producto en existencias');window.location.href='index.php';</script>");
                }
            }
        }

        unset($carrito[$_GET["idp"]]);
        $carrito += array($_GET["idp"] => $valor);
        $_SESSION["sCarrito"] = $carrito;
        echo ("<script>window.location.href='index.php';</script>");
    }
}
