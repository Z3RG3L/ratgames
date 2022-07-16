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
    <div style="background-color:Teal" class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 style="color:white">MUNICIPIO</h1>
            </div>
            <div class="col-sm-6">
            <?php
           
             ?>
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
                  <h3 class="card-title">Lista de municipios</h3>
                  <?php
                  $btnBorrados = "Mostrar todos";
                  $accBorrados = "municipiolst.php?borrados=si";
                  if (isset($_REQUEST["borrados"])) {
                    $btnBorrados = "Ocultar borrados";
                    $accBorrados = "municipiolst.php";
                  } else {
                    if (isset($_REQUEST["soloborrados"])) {
                      $btnBorrados = "Mostrar activos";
                      $accBorrados = "municipiolst.php";
                    }
                  }

                  ?>
                  <br><a class="btn btn-dark" href="<?= $accBorrados ?>"><?= $btnBorrados ?></a>
                  <a class="btn btn-danger" href="municipiolst.php?soloborrados=si">Mostrar solo borrados</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Clave de municipio</th>
                        <th>Nombre de municipio</th>
                        <th>Prefijo</th>
                        <th>Activo</th>
                        <th>Clave de estado</th>
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

                      $sql = "select * from municipio $borrados";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $colorInactivo = "";
                          if ($row["activo"] == "0") {
                            $colorInactivo = "style='color:red'";
                          }

                          echo "
                          <tr $colorInactivo>
                            <td>" . $row["cve_mun"] . "</td>
                            <td>" . $row["nom_mun"] . "</td>
                            <td>" . $row["prefijo"] . "</td>
                            <td>" . $row["activo"] . "</td>
                            <td>" . $row["cve_est"] . "</td>
                            <td><a href='municipio.php?cvemun=" . md5($row["cve_mun"]) . "'><i class=\"far fa-edit\"></i></a></td>
                            <td><a href='municipioAcciones.php?acc=elimina&cvemun=" .  md5($row["cve_mun"])  . "'><i class=\"fa fa-trash-alt\"></i></a></td>
                         
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
                        <th>Prefijo</th>
                        <th>Activo</th>
                        <th>Clave de estado</th>
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