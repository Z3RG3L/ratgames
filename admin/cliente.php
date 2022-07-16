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

    
$id_clie = "";
$nom_clie = "";
$ap_clie = "";
$am_clie  = "";   
$cel_clie = "";   
$calle_clie  = "";
$cp_clie = ""; 
$ni_clie  = ""; 
$ne_clie  = ""; 
$col_clie = "";
$rfc_clie = "";
$cve_mun = "";
$nom_usu = "";
$correo_clie = "";
$activo_clie = "";
$destino = "";

    if (isset($_REQUEST["id_clie"])) {

      include("conexion.php");

      $sql = "select id_clie, nom_clie, ap_clie, am_clie, cel_clie, calle_clie, cp_clie, ni_clie, ne_clie, col_clie, rfc_clie, cve_mun, nom_usu, correo_clie from cliente where md5(id_clie) = '" . $_REQUEST["id_clie"] . "'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          $destino = "?id_clie=" . md5($row["id_clie"]);
          $nom_clie = $row["nom_clie"];
          $ap_clie = $row["ap_clie"];
          $am_clie = $row["am_clie"];
          $cel_clie = $row["cel_clie"];
          $calle_clie  = $row["calle_clie"];
          $cp_clie = $row["cp_clie"];
          $ni_clie  = $row["ni_clie"];
          $ne_clie  = $row["ne_clie"];
          $col_clie = $row["col_clie"];
          $rfc_clie = $row["rfc_clie"];
          $cve_mun = $row["cve_mun"];
          $nom_usu = $row["nom_usu"];
          $correo_clie = $row["correo_clie"];
          $activo_clie = $row["activo"];

          echo "<script>console.log(\"$activo_clie\");</script>";
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
              <h1 style="color:white">CLIENTES</h1>
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
                  <h3 class="card-title">Alta de clientes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Llene los siguientes campos:</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="clienteAcciones.php<?= $destino ?>" method="post">
                      <div class="card-body">
                      <div class="form-group">
                          <label for="cvemun">ID de cliente:</label>
                          <input type="text" disabled class="form-control" name="id_clie" id="id_clie" value="<?= $id_clie?>" placeholder="ID de cliente.">
                        </div> 
                        <div class="form-group">
                          <label for="nombre">Nombre:</label>
                          <input size="3" type="text" class="form-control" name="nom_clie" id="nom_clie" value="<?= $nom_clie ?>" placeholder="Nombre de cliente.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Apellido paterno:</label>
                          <input size="3" type="text" class="form-control" name="ap_clie" id="ap_clie" value="<?= $ap_clie ?>" placeholder="Apellido paterno.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Apellido materno:</label>
                          <input size="3" type="text" class="form-control" name="am_clie" id="am_clie" value="<?= $am_clie ?>" placeholder="Apellido materno.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Celular:</label>
                          <input size="3" type="text" class="form-control" name="cel_clie" id="cel_clie" value="<?= $cel_clie ?>" placeholder="Número de celular.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Calle:</label>
                          <input size="3" type="text" class="form-control" name="calle_clie" id="calle_clie" value="<?= $calle_clie ?>" placeholder="Calle.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Código postal:</label>
                          <input size="3" type="text" class="form-control" name="cp_clie" id="cp_clie" value="<?= $cp_clie ?>" placeholder="Código postal.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Numero interior:</label>
                          <input size="3" type="text" class="form-control" name="ni_clie" id="ni_clie" value="<?= $ni_clie ?>" placeholder="Número interior.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Numero exterior:</label>
                          <input size="3" type="text" class="form-control" name="ne_clie" id="ne_clie" value="<?= $ne_clie ?>" placeholder="Número exterior.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">Colonia:</label>
                          <input size="3" type="text" class="form-control" name="col_clie" id="col_clie" value="<?= $col_clie ?>" placeholder="Colonia.">
                        </div>
                        <div class="form-group">
                          <label for="nombre">RFC:</label>
                          <input size="3" type="text" class="form-control" name="rfc_clie" id="rfc_clie" value="<?= $rfc_clie ?>" placeholder="RFC.">
                        </div>
                        <div class="form-group">
<label for="nombre">Clave de municipio:</label>
<select class="form-control" name="cve_mun" id="cve_mun" value="<?= $cve_mun; ?>">
<option value="">-- Selecciones una opcion --</option>
<?php
include("conexion.php");
$nom_mun = "";
$sql = "select cve_mun, nom_mun from municipio";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$nom_mun = $row["nom_mun"];
if ($cve_mun == $row["cve_mun"]) {
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
                        
                        <div class="form-group">
                          <label for="nombre">Nombre de usuario:</label>
                          <input size="3" type="text" class="form-control" name="nom_usu" id="nom_usu" value="<?= $nom_usu ?>" placeholder="Nombre de usuario.">
                        </div>
                         <div class="form-group">
                          <label for="nombre">Correo electrónico:</label>
                          <input size="3" type="text" class="form-control" name="correo_clie" id="correo_clie" value="<?= $correo_clie ?>" placeholder="Correo electrónico.">
                        </div>
                        <div class="form-check">
                        <?php
                        $chequeado = "";
                        if ($activo_clie == 1) {
                          $chequeado = "checked";
                        }
                        ?>
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