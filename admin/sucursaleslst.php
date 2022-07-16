<?php
session_start();

include_once("validasesion.php");
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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>SUCURSALES</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Sucursales</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Listado de Sucursales</h3>
                                <?php
                                $btnBorrados = "Mostrar todos";
                                $accBorrados = "sucursaleslst.php?borrados=si";
                                if (isset($_REQUEST["borrados"])) {
                                    $btnBorrados = "Ocultar borrados";
                                    $accBorrados = "sucursaleslst.php";
                                } else {
                                    if (isset($_REQUEST["soloborrados"])) {
                                        $btnBorrados = "Mostrar activos";
                                        $accBorrados = "sucursaleslst.php";
                                    }
                                }

                                ?>
                                <br><a class="btn btn-dark" href="<?= $accBorrados ?>"><?= $btnBorrados ?></a>
                                <a class="btn btn-danger" href="sucursaleslst.php?soloborrados=si">Mostrar solo borrados</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID_SUCURSAL</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Calle</th>
                                        <th>CP</th>
                                        <th>Número Interior</th>
                                        <th>Número Exterior</th>
                                        <th>Colonia</th>
                                        <th>CVE Municipio</th>
                                        <th>Activo</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    include("conexion.php");
                                    $borrados = " where activo = 1";
                                    if (isset($_REQUEST["borrados"])) {
                                        $borrados = "";
                                    } else {
                                        if (isset($_REQUEST["soloborrados"])) {
                                            $borrados = " where activo = 0";
                                        }
                                    }

                                    $sql = "select * from sucursal $borrados";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $colorInactivo = "";
                                            if ($row["activo"] == "0") {
                                                $colorInactivo = "style='color:red'";
                                            }

                                            echo "
                          <tr $colorInactivo>
                            <td>" . $row["id_suc"] . "</td>
                            <td>" . $row["nom_suc"] . "</td>
                            <td>" . $row["tel_suc"] . "</td>
                            <td>" . $row["calle_suc"] . "</td>
                            <td>" . $row["cp_suc"] . "</td>
                            <td>" . $row["ni_suc"] . "</td>
                            <td>" . $row["ne_suc"] . "</td>
                            <td>" . $row["col_suc"] . "</td>
                            <td>" . $row["cve_mun"] . "</td>
                            <td>" . $row["activo"] . "</td>
                            <td><a href='sucursales.php?sucursal=" . $row["id_suc"] . "'><i class=\"far fa-edit\"></i></a></td>
                            <td><a href='sucursalesAcciones.php?acc=elimina&sucursal=" .  ($row["id_suc"])  . "'><i class=\"fa fa-trash-alt\"></i></a></td>
                         
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
                                        <th>ID_SUCURSAL</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Calle</th>
                                        <th>CP</th>
                                        <th>Número Interior</th>
                                        <th>Número Exterior</th>
                                        <th>Colonia</th>
                                        <th>CVE Municipio</th>
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

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="./plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./plugins/jszip/jszip.min.js"></script>
<script src="./plugins/pdfmake/pdfmake.min.js"></script>
<script src="./plugins/pdfmake/vfs_fonts.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>