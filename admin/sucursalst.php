<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de sucursales</title>
    <?php
    include ("../css.php");
    ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php
    include("../header.php");
    include("../menu.php");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div body style="background-color: darkcyan" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>sucursales</h1>
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
                                <h3 class="card-title">Lista de sucursales</h3>

                                <br>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="sucur" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Clave de la sucursal</th>
                                        <th>Nombre de la sucursal</th>
                                        <th>Telefono</th>
                                        <th>Calle</th>
                                        <th>colonia</th>
                                        <th>Numero interior</th>
                                        <th>Numero exterior</th>
                                        <th>clave del municipio</th>
                                        <th>nombre del municipio</th>
                                        <th>codigo postal</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include("../conexion.php");
                                    $sql = "select * from sucursal,municipio where sucursal.cve_muni=municipio.cve_muni  ";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                    <td>" . $row["cve_suc"] . "</td>
                    <td>" . $row["nom_suc"] . "</td>
                    <td>" . $row["tel_suc"] . "</td>
                    <td>" . $row["calle_suc"] . "</td>
                     <td>" . $row["col_suc"] . "</td>
                      <td>" . $row["Nint_suc"] . "</td>
                       <td>" . $row["Next_suc"] . "</td>
                        <td>" . $row["cve_muni"] . "</td>
                         <td>" . $row["nom_muni"] . "</td>
                         <td>" . $row["cp_suc"] . "</td>
                       <td><a href='sucursal.php?cve_suc=" . MD5($row["cve_suc"]) . "'><i class='far fa-edit'></i> </a></td>
                       <td><a href='sucursalAcciones.php?acc=elimina&cve_suc=" . MD5($row["cve_suc"]) . "'><i class='far fa-trash-alt'></i></a></td>
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
                                        <th>Clave de la sucursal</th>
                                        <th>Nombre de la sucursal</th>
                                        <th>Telefono</th>
                                        <th>Calle</th>
                                        <th>colonia</th>
                                        <th>Numero interior</th>
                                        <th>Numero exterior</th>
                                        <th>clave del municipio</th>
                                        <th>nombre del municipio</th>
                                        <th>codigo postal</th>
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

<?php
include ("../js.php")
?>
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