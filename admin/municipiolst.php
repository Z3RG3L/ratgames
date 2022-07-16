<?php
session_start();

include_once("ValidaSesion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        include("header.php");

        include("menu.php");

        ?>

    <!-- Content Wrapper. Contains page content -->
    <div body style="background-color: darkcyan" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>municipios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Lista sucursales</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de municipios</h3>

                                <br>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="sucur" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Clave de municipio</th>
                                        <th>Nombre de municipio</th>
                                        <th>Clave de estado</th>
                                        <th>Prefijo de estado</th>
                                        <th>Activo</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include("conexion.php");
                                    $sql = "select * from estado,municipio where estado.cve_est=municipio.cve_est  ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                    <td>" . $row["cve_mun"] . "</td>
                    <td>" . $row["nom_mun"] . "</td>
                    <td>" . $row["cve_est"] . "</td>
                    <td>" . $row["prefijo"] . "</td>
                     <td>" . $row["activo"] . "</td>
                       <td><a href='municipio.php?cve_suc=" . MD5($row["cve_mun"]) . "'><i class='far fa-edit'></i> </a></td>
                       <td><a href='municipioAcciones.php?acc=elimina&cve_mun=" . MD5($row["cve_mun"]) . "'><i class='far fa-trash-alt'></i></a></td>
                  </tr>
                  ";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    $conn->close();

                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                    <th>Clave de municipio</th>
                                        <th>Nombre de municipio</th>
                                        <th>Clave de estado</th>
                                        <th>Prefijo de estado</th>
                                        <th>Activo</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
    $(function () {
        $("#sucur").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,searching: true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#sucur_wrapper .col-md-6:eq(0)');
    });
</script>
</body>
</html>