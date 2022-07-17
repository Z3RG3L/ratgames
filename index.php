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
    <title>Pizza Time !</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php include("header.php"); ?>
    <!-- Header-->
    <header class="bg-dark py-5" style="background-image:url(./admin/dist/uploadImg/prueba.jpg)">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">RAT GAMES </h1>
                <p class="lead fw-normal text-white-50 mb-0">Simplemente la mejor opcion en gaming</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                include("./admin/conexion.php");
                $whereidcat = "";
                if (isset($_REQUEST["idcat"])) {
                    $whereidcat = " and md5(idcategoria) ='" . $_REQUEST["idcat"] . "'";
                }
                $sql = "select * from producto as p inner join inventario as i on i.idproducto = p.idproducto where p.activo = 1 " . $whereidcat;

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">OFERTA!</div>
                            <a href="item.php?idprod=' . md5($row["idproducto"]) . '"><img class="card-img-top" src="' . $row["urlfoto"] . '" alt="..." /></a>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">' . $row["nombreproducto"] . '</h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <span class="text-muted text-decoration-line-through">$' . $row["precio"] * 1.17 . '</span>
                                    $' . $row["precio"] . '
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="agregacarrito.php?idp=' . $row["idproducto"] . '">Añadir al carrito</a></div>
                            </div>
                        </div>
                    </div>';
                    }
                } else {
                    echo "<h3>!Regresa pronto para más promociones!</h3>";
                }
                $conn->close();

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