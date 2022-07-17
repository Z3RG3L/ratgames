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
                <h1>Carrito de compras</h1>
                <?php

                $carrito = $_SESSION["sCarrito"];

                $cuentaCarrito = count($carrito);
                if ($cuentaCarrito > 0) {
                    echo ' <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>idProducto</th>
                            <th>NombreProducto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Importe</th>
                            <th>Eliminar</th>
                          </tr>
                        </thead>
                        <tbody>';
                    foreach ($carrito as $x => $x_value) {


                        include("./admin/conexion.php");
                        $sql = "select * from producto as p inner join inventario as i on p.idproducto = i.idproducto where p.activo = 1 and p.idproducto = " . $x;

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {


                                echo '<tr>
                                    <td>' . $row["idproducto"] . '</td>
                                    <td>' . $row["nombreproducto"] . '</td>
                                    <td>' . $x_value . '</td>
                                    <td>$' . number_format(($row["precio"]), 2, '.', ',') . ' </td>
                                    <td>$' . number_format(($row["precio"] * $x_value), 2, '.', ',')  . '</td>
                                    <td><a href="eliminacarrito.php?idp=' . $row["idproducto"] . '" class="btn btn-danger">Eliminar</a></td>
                                  </tr>
                                  ';
                            }
                        }
                    }
                    echo '</tbody>
                    </table>
                    <a class="btn btn-primary" href="checkout">Checkout</a>';
                } else {
                    echo "<br><br><h3>Aún no tienes nada en tu carrito, mira las siguientes recomendaciones.</h3>";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Recomendaciones:</h2>
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