<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?php include("header.php"); ?>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <h1>Confirmar compra.</h1><br /><br />
                <?php
                include("./admin/conexion.php");
                $sql = " select * from cliente inner join usuario where md5(usuario.idusuario) = '" . $_SESSION["sIdusuario"] . "'";

                $result = $conn->query($sql);
                $c_nombre = "";
                $c_rfc = "";
                $c_direccion = "";
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $c_nombre = $row["nombre"];
                        $c_rfc = $row["rfc"];
                        $c_direccion = $row["direccion"];
                    }
                }

                $carrito = $_SESSION["sCarrito"];

                $cuentaCarrito = count($carrito);

                $TotalCompra = 0;
                if ($cuentaCarrito > 0) {
                    foreach ($carrito as $x => $x_value) {
                        include("./admin/conexion.php");

                        $sql = "select precio from producto inner join inventario on producto.idproducto = inventario.idinventario where producto.idproducto = " . $x;

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $TotalCompra += ($row["precio"] * $x_value);
                            }
                        }
                    }
                }


                echo "<br><h1>Pedido confirmado para: " . $c_nombre . "</h1>";
                echo "<h2>Dirección de envío: " . $c_direccion . "</h2>";
                echo "<h2>R.F.C. Para factura: " . $c_rfc  . "</h2>";
                echo "<h2>El subtotal de su compra es: $ " . number_format($TotalCompra, 2, '.', ',') . "</h2>";
                echo "<h2>El I.V.A. de su compra es: $ " . number_format(($TotalCompra * 0.16), 2, '.', ',') . "</h2>";
                echo "<h2>El total de su compra es: $ " . number_format(($TotalCompra * 1.16), 2, '.', ',') . "</h2>";


                ?>
                <div class='product_wrapper'>

                    <form method='post' action='https://www.sandbox.paypal.com/cgi-bin/webscr'>

                        <!-- PayPal business email to collect payments -->
                        <input type='hidden' name='business' value='gabriel.martin-facilitator@uteq.edu.mx'>

                        <!-- Details of item that customers will purchase -->
                        <input type='hidden' name='item_number' value='0'>
                        <input type='hidden' name='item_name' value='PizzaTime'>
                        <input type='hidden' name='amount' value='<?= ($TotalCompra * 1.16) ?>'>
                        <input type='hidden' name='currency_code' value='MXN'>
                        <input type='hidden' name='no_shipping' value='1'>

                        <!-- PayPal return, cancel & IPN URLs -->
                        <input type='hidden' name='return' value='http://localhost/uteQ_T203/integradora/confirmado.php'>
                        <input type='hidden' name='cancel_return' value='http://localhost/uteQ_T203/integradora/cancelado.php'>
                        <input type='hidden' name='notify_url' value='http://localhost/uteQ_T203/integradora/cancelado.php'>

                        <!-- Specify a Pay Now button. -->
                        <input type="hidden" name="cmd" value="_xclick">
                        <button onclick="alert('Saliendo del sitio para ir a Paypal')" class='btn btn-primary btn-lg' type='submit' class='pay'><i style="color:yellow" class="fab fa-paypal"></i> &nbsp;Pagar en Paypal</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Antojos de ultima hora.:</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                include("./admin/conexion.php");
                $sql = "select * from producto as p inner join inventario as i on i.idproducto = p.idproducto order by rand() limit 4";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    //var_dump($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        //var_dump($row);
                        echo '<div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="' . $row["urlfoto"] . '" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">' . $row["nombreproducto"] . '</h5>
                                    $' . $row["precio"] . '
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                ?>



            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>