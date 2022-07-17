<!DOCTYPE html>
<html lang="en">
    <head>
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
    <body>

    <!--HEADER-->

    <?php
    include ("header.php");
    ?>

    <!--/HEADER-->

        <!-- Seleccion de producto-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://img.freepik.com/vector-gratis/logotipo-retro-videojuegos-luces-neon_23-2148236553.jpg" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">Juegos modernos y clasicos.</h1>

                        <p class="lead">Contactanos en nuestras redes sociales</p>
                        <img height="50" width="50" src="https://cdn-icons-png.flaticon.com/512/20/20673.png">
                        <img height="50" width="50" src="https://cdn-icons-png.flaticon.com/512/60/60580.png">
                        <img height="50" width="" src="https://pngroyale.com/wp-content/uploads/2021/12/Download-free-Logo-do-Instagram-PNG-PNG.png">

                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4" >JUEGOS</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">




                <?php
                include("./admin/conexion.php");

                $sql = "SELECT * from producto";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '
                    <div class="col mb-xl-3">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top"  src="'.$row["img_prod"].'" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">"'.$row["nom_pro"].'"</h5>
                                    <!-- Product price-->
                                   $'.$row["prec_pro"].'
                           
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Agregar al carrito</a></div>
                            </div>
                        </div>
                    </div>
                ';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
            </div>


        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright © 2022 Rat Games. All rights reserved.
                    Content from this website may NOT be used or reproduced in whole or in part without express written permission from Rat Games.
                    Violators will be prosecuted to the fullest extent of the law.</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
