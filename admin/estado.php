<?php
session_start();

include_once("ValidaSesion.php");
?>
<!DOCTYPE html>
<html lang="en">

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

    $cveest = "";
    $nomest = "";
    $prefijoest = "";
    $activoest = "";
    $destino = "";

    if (isset($_REQUEST["cveest"])){

      include("conexion.php");

      $sql = "select cve_est, nom_est, activo, prefijo from estado where md5(cve_est) = '" . $_REQUEST["cveest"] . "'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          $destino = "?cveest=" . md5($row["cve_est"]);
          $cveest = $row["cve_est"];
          $nomest = $row["nom_est"];
          $prefijoest = $row["prefijo"];
          $activoest = $row["activo"];
          echo "<script>console.log(\"$activoest\");</script>";
        }
      } else {
        echo "0 results";
      }

      mysqli_close($conn);
    }
    ?>

<!-- Content Wrapper. Contains page content -->
<div style="background-color:Teal" class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div   class="col-sm-6">
              <h1 style="color:white">Estado</h1>
            </div>
            <div class="col-sm-6">
             <?php
           
             ?>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      
      <!-- /.container-fluid -->
      <section  class="content">
        <div  class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Alta de estado</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Llene los siguientes campos:</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="estadoAcciones.php<?= $destino ?>" method="post">
                      <div class="card-body">
                      <div class="form-group">
                          <label for="idproducto">ID de estado:</label>
                          <input type="text" disabled class="form-control" name="cve_est" id="cve_est" value="" placeholder="Clave de estado.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Nombre de estado:</label>
                          <input type="text" class="form-control" name="nom_est" id="nom_est" value="<?= $nomest; ?>" placeholder="Nombre de estado.">
                        </div>

                        <div class="form-group">
                          <label for="nombre">Prefijo de estado:</label>
                          <input size="3" type="text" class="form-control" name="prefijo" id="prefijo" value="<?= $prefijoest ?>" placeholder="Prefijo de estado. (Ej.: AAA)">
                        </div>
                        <?php
                        $chequeado = "";
                        if ($activoest == 1) {
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