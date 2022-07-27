<?php
session_start();
$carrito = $_SESSION["sCarrito"];

if (isset($_GET["idp"]) or isset($_GET["id_prod"])) {
    if (isset($_GET["cant"])) {
    } else {
        $valor = 1;

        foreach ($carrito as $x => $x_value) {
            if ($x == $_GET["idp"]) {
                echo "x: " . $x;
                echo "idp: " . $_GET["idp"];

                $valor += $x_value;
                echo "valor: " . $valor . "<br>";
            }
        }

        unset($carrito[$_GET["idp"]]);
        $carrito += array($_GET["idp"] => $valor);
        $_SESSION["sCarrito"] = $carrito;
        echo ("<script>window.location.href='index.php';</script>");
    }
}