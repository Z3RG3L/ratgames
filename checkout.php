<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<body style="background-color:#B1A8FC" head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body style="background-color:#F0F71F" body>
    <!-- Navigation-->
    <?php include("header2.php"); ?>
    <!-- Product section-->
    <section class="py-5">
        <body style="background-color:#B1A8FC" div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <body style="background-color:#F7AF1F" >
                <h1>Confirmar Compra</h1> <br /><br>
                <?php

                        include("./admin/conexion.php");
                        $sql = "select * from cliente inner join usuario on cliente.nom_usu=usuario.nom_usu where md5(usuario.nom_usu) = '" . $_SESSION["sNom_usu"] . "'";

                        $result = $conn->query($sql);

                        $nomclie = "";
                        $apclie = "";
                        $amclie = "";
                        $rfcclie = "";
                        $colclie = "";
                        $calleclie = "";
                        $nextclie = "";
                        $nint = "";
                        $cpclie = "";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $nomclie = $row["nom_clie"];
                                $apclie = $row["ap_clie"];
                                $amclie = $row["am_clie"];
                                $rfcclie = $row["rfc_clie"];
                                $colclie = $row["col_clie"];
                                $calleclie = $row["calle_clie"];
                                $nextclie = $row["ne_clie"];
                                $nint = $row["ni_clie"];
                                $cpclie = $row["cp_clie"];
                            }
                        }  

                $carrito = $_SESSION["sCarrito"];

                $cuentaCarrito = count($carrito);

                $totalCom = 0;
                if ($cuentaCarrito > 0) {
                    foreach ($carrito as $x => $x_value) {
                        include("./admin/conexion.php");

                        $sql = "select prec_pro from producto  where producto.id_pro = " . $x ;
                    
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $totalCom += ($row["prec_pro"] * $x_value);
                            }
                        }

                    }

                }

                         echo "<h1>Pedido para: " . $nomclie . " " . $apclie . " " . $amclie . "</h1>";
                         echo "<h1>Dirección de envío: " . $colclie . " " . $calleclie . " #" . $nextclie . " - " . $nint . "</h1>";
                         echo "<h1>RFC para factura: " . $rfcclie . "</h1>";  
                         echo "<h2>El subtotal de compra: $ " . number_format($totalCom, 2, '.', ',') . "</h2>";
                         echo "<h2>El IVA de compra: $ " . number_format(($totalCom * 0.16), 2, '.', ',') . "</h2>";
                         echo "<h2>El total de compra: $ " . number_format(($totalCom * 1.16), 2, '.', ',') . "</h2>";
         
         
                         ?>
                         <div class='product_wrapper'>
         
                             <form method='post' id="form_pay" action='https://www.sandbox.paypal.com/cgi-bin/webscr'>
         
                                 <!-- PayPal business email to collect payments -->
                                 <input type='hidden' name='business' value='vendedor@business.example.com'>
         
                                 <!-- Details of item that customers will purchase -->
                                 <input type='hidden' name='item_number' value='0'>
                                 <input type='hidden' name='item_name' value='RATGAMES'>
                                 <input type='hidden' name='amount' value='<?= ($TotalCompra * 1.16) ?>'>
                                 <input type='hidden' name='currency_code' value='MXN'>
                                 <input type='hidden' name='no_shipping' value='1'>
         
                                 <!-- PayPal return, cancel & IPN URLs -->
                                 <input type='hidden' name='return' value='http://localhost/ratgames/confirmado.php'>
                                 <input type='hidden' name='cancel_return' value='http://localhost/ratgames/cancelado.php'>
                                 <input type='hidden' name='notify_url' value='http://localhost/ratgames/cancelado.php'>
         
                                 <!-- Specify a Pay Now button. -->
                                 <input type="hidden" name="cmd" value="_xclick">
                                 <button class='btn btn-primary btn-lg' type='submit' class='pay'><i style="color:yellow" class="fab fa-paypal"></i> &nbsp;Pagar en Paypal</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <body style="background-color:#B1A8FC" div class="container px-4 px-lg-5 mt-5">
            <body style="background-color:#B1A8FC" h2 class="fw-bolder mb-4">Recomendaciones:</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                include("./admin/conexion.php");
                $sql = "select producto.id_pro,exist_prod,prec_pro,img_prod,nom_pro from producto,inventario where producto.id_pro=inventario.id_pro order by rand() limit 4";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    //var_dump($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        //var_dump($row);
                        echo '<div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="' . $row["img_prod"] . '" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">' . $row["nom_pro"] . '</h5>
                                    $' . $row["prec_pro"] . ' MX
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="agregacarrito.php?idp=' . $row["id_pro"] . '">Añadir al carrito</a></div>
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