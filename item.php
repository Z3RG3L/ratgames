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
    <title>RAT GAMES</title>
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
<!-- Product section
<a href='index.php' class="btn btn-dark">Regresar</a>-->
<section class="py-5">

    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">

            <?php
            include("./admin/conexion.php");
            $sql = "select * from producto inner join inventario on inventario.id_pro = producto.id_pro where md5(producto.id_pro) = '" . $_REQUEST["idprod"] . "'";

            $result = mysqli_query($conn, $sql);
            $mininventario = 1;
            $id_pro = 0;
            $nom_pro  = "";
            $prec_pro  = 0;

            $img_prod  = "";
            $inventario = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_pro = $row["id_pro"];
                    $nom_pro  = $row["nom_pro"];
                    $prec_pro  = $row["prec_pro"];

                    $img_prod  = $row["img_prod"];
                    $inventario = $row["exist_prod"];
                }
            } else {
                echo "0 results";
            }
            if ($inventario < 1) {
                $mininventario = 0;
            }
            mysqli_close($conn);
            ?>
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= $img_prod  ?>" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: <?= $_REQUEST["idprod"] ?></div>
                <h1 class="display-5 fw-bolder"><?= $nom_pro  ?></h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through"><?php echo $prec_pro * 1.13 ?></span>
                    <span>$<?= $prec_pro ?></span>
                </div>

                <form action="agregacarrito.php" method="get" cause>
                    <input type="text" style="visibility:hidden;" value="<?= $_REQUEST["idprod"] ?>" name="idprod" value="idprod">
                    <div class="d-flex">
                        <?php
                        if ($mininventario < 1) {
                            echo '<div class="alert alert-warning" role="alert">
                                Lo sentimos, no tenemos en existencias
                              </div>';
                        } else {
                            echo '<br><input required class="form-control text-center me-3" id="cant" name="cant" type="number" value="0" min="' . $mininventario . '" max="' . $inventario . '" style="max-width: 5rem" />
                                <input type="submit" value="Agregar al carrito" class="btn btn-outline-dark flex-shrink-0">';
                        }
                        ?>


                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            include("./admin/conexion.php");
            $sql = "select * from producto as p inner join inventario as i on i.id_pro = p.id_pro order by rand() limit 4";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                    echo '<div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="' . $row["img_prod"] . '" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">' . $row["nom_pro"] . '</h5>
                                    $' . $row["prec_pro"] . '
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