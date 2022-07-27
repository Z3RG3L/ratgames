<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<aside body style="background-color:#5A8BF6" class="main-sidebar sidebar-dark-primary elevation-4">
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RAT GAMES</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
</aside>

<body style="background-color:#B1A8FC" div  class="container px-4 px-lg-5">
    <?php include("header2.php"); ?>
    <!-- Header-->
    <header class="bg-dark py-5" style="background-image:url(https://media.istockphoto.com/vectors/neon-icons-for-decoration-in-gaming-clubs-vector-id1169731789?k=20&m=1169731789&s=612x612&w=0&h=c1_lCsQFhW_ts-VKlhQLkBwUPqug2eRFMtaXAYgAH7k=)">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">RAT GAMES</h1>
                <h3 style="color:white">Tú mejor opción para comprar si buscas videojuegos.</h3>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php
                include("./admin/conexion.php");
                $wherecvecat = "";
                if (isset($_REQUEST["cvecat"])) {
                    $wherecvecat = " and md5(cve_cat) ='" . $_REQUEST["cvecat"] . "'";
                }
                $sql = "select * from producto where activo = 1 " . $wherecvecat;

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"></div>
                            <a href="item.php?idprod=' . md5($row["id_pro"]) . '"><img class="card-img-top" src="' . $row["img_prod"] . '" alt="..." /></a>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">' . $row["nom_pro"] . '</h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <span class="text-muted text-decoration-line-through"></span>
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
                    echo "<h3>¡Por el momento no hay algo que mostrar!</h3>";
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