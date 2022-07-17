<?php
session_start();
$carrito = $_SESSION["sCarrito"];

if (isset($_GET["idp"])) {
    unset($carrito[$_GET["idp"]]);
    $_SESSION["sCarrito"] = $carrito;
    echo ("<script>window.location.href='carrito.php';</script>");
}
