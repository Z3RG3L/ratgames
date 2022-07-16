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
<div body class="wrapper">
    <?php
    include("header.php");

    include("menu.php");

    $id_suc = "";
    $nombre = "";
    $telefono = "";
    $calle = "";
    $cp = "";
    $ni = "";
    $ne = "";
    $col = "";
    $cveMun = "";
    $activo = "";
    $destino = "";
    if (isset($_REQUEST["sucursal"])) {

        include("conexion.php");

        $sql = "select id_suc,nom_suc,tel_suc,calle_suc,
       cp_suc,ni_suc,ne_suc,col_suc,cve_mun,activo from sucursal 
                    where(id_suc) = '" . $_REQUEST["sucursal"] . "'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $destino = "?sucursal=" . ($row["id_suc"]);
                $id_suc = $row["id_suc"];
                $nombre = $row["nom_suc"];
                $telefono = $row["tel_suc"];
                $calle = $row["calle_suc"];
                $cp = $row["cp_suc"];
                $ni = $row["ni_suc"];
                $ne = $row["ne_suc"];
                $col = $row["col_suc"];
                $cveMun = $row["cve_mun"];
                $activo = $row["activo"];

                echo "<script>console.log(\"$activo\");</script>";
            }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
    }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div body style="background-color:Teal" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 style="color:white;">Sucursal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div body style="background-color:Teal" class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Alta de Sucursales</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Llene los siguientes datos:</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="sucursalesAcciones.php<?= $destino ?>" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre de la sucursal:</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $nombre; ?>" placeholder="Nombre de la sucursal.">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">Telefono:</label>
                                                <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $telefono; ?>" placeholder="Número de telefono.">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">calle :</label>
                                                <input type="text" class="form-control" name="calle" id="calle" value="<?= $calle; ?>" placeholder="Nombre de la calle.">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">Codigo Postal:</label>
                                                <input type="text" class="form-control" name="cp" id="cp" value="<?= $cp; ?>" placeholder="Codigo Postal.">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">Número interior</label>
                                                <input type="text" class="form-control" name="ni" id="ni" value="<?= $ni; ?>" placeholder="Número interior.">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">Número exterior</label>
                                                <input type="text" class="form-control" name="ne" id="ne" value="<?= $ne; ?>" placeholder="Número exterior.">
                                            </div>

                                            <div class="form-group">
                                                <label for="nombre">Colonia</label>
                                                <input type="text" class="form-control" name="col" id="col" value="<?= $col; ?>" placeholder="Colonia.">
                                            </div>

                                            <div class="form-group">
<label for="nombre">Clave del municipio:</label>
<select class="form-control" name="cve_mun" id="cve_mun" value="<?= $cveMun; ?>">
<option value="">-- Selecciones una opcion --</option>
<?php
include("conexion.php");
$nom_mun = "";
$sql = "select cve_mun, nom_mun from municipio";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$nom_mun = $row["nom_mun"];
if ($cveMun == $row["cve_mun"]) {
echo "<option value='" . $row["cve_mun"] . "' selected='selected'>" . $row["cve_mun"] . ' - '. $row["nom_mun"] ."</option>";
} else {
echo "<option value='" . $row["cve_mun"] . "'>" . $row["cve_mun"] .' - '. $row["nom_mun"] . "</option>";
}
}
} else {
echo "0 results";
}
$conn->close();
?>
</select>
</div>

                                            <?php
                                            $chequeado = "";
                                            if ($activo == 1) {
                                                $chequeado = "checked";
                                            }
                                            ?>
                                            <div class="form-check">
                                                <input <?= $chequeado ?> type="checkbox" class="form-check-input" id="activo" name="activo">
                                                <label class="form-check-label" for="activo">Activo.</label>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
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
