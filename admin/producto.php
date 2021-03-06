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

    $idpro = "";
    $nompro = "";
    $precpro = "";
    $cvecat = "";
    $ctopro = "";
    $imgpro = "";
    $activopro = "";
    $prefijopro = "";
    $destino = "";

    if (isset($_REQUEST["idpro"])) {

      include("conexion.php");

      $sql = "select id_pro, nom_pro, prec_pro, cve_cat, cto_pro, img_prod, activo, prefijo from producto where md5(id_pro) = '" . $_REQUEST["idpro"] . "'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          $destino = "?idpro=" . md5($row["id_pro"]);
          $idpro = $row["id_pro"];
          $nompro = $row["nom_pro"];
          $cvecat = $row["cve_cat"];
          $precpro = $row["prec_pro"];
          $ctopro = $row["cto_pro"];
          $imgpro = $row["img_prod"];
          $prefijopro = $row["prefijo"];
          $activopro = $row["activo"];
          echo "<script>console.log(\"$activopro\");</script>";
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
            <div   class="col-sm-6">
              <h1 style="color:white">PRODUCTO</h1>
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
                  <h3 class="card-title">Alta de productos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Llene los siguientes campos:</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="productoAcciones.php<?= $destino ?>" method="post">
                      <div class="card-body">
                      <div class="form-group">
                          <label for="idprod">ID de producto:</label>
                          <input type="text" disabled class="form-control" name="id_pro" id="id_pro" value="<?= $idpro ?>" placeholder="Clave de producto.">
                        </div> 
                        <div class="form-group">
                          <label for="nombre">Nombre de producto:</label>
                          <input size="3" type="text" class="form-control" name="nom_pro" id="nom_pro" value="<?= $nompro ?>" placeholder="Nombre de producto.">
                        </div>
                        <div class="form-group">
                          <label for="precio">Precio de producto:</label>
                          <input size="3" type="text" class="form-control" name="prec_pro" id="prec_pro" value="<?= $precpro ?>" placeholder="Precio de producto.">
                        </div>
                        <div class="form-group">
<label for="nombre">Categoria:</label>
<select class="form-control" name="cve_cat" id="cve_cat" value="<?= $cvecat; ?>">
<option value="">-- Selecciona una opcion --</option>
<?php
include("conexion.php");
$nom_cat = "";
$sql = "select cve_cat, nom_cat from categoria";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$nom_cat = $row["nom_cat"];
if ($cvecat == $row["cve_cat"]) {
echo "<option value='" . $row["cve_cat"] . "' selected='selected'>" . $row["cve_cat"] . ' - '. $row["nom_cat"] ."</option>";
} else {
echo "<option value='" . $row["cve_cat"] . "'>" . $row["cve_cat"] .' - '. $row["nom_cat"] . "</option>";
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
                          <label for="costo">Costo de producto:</label>
                          <input size="3" type="text" class="form-control" name="cto_pro" id="cto_pro" value="<?= $ctopro ?>" placeholder="Costo de producto.">
                        </div>
                        <div class="form-group">
                          <label for="imagen">URL de imagen de producto:</label>
                          <input size="3" type="text" class="form-control" name="img_prod" id="img_prod" value="<?= $imgpro ?>" placeholder="URL de la imagen.">
                        </div>
                        <div class="form-group">
                          <label for="prefijo">Prefijo de la categor??a:</label>
                          <input size="3" type="text" class="form-control" name="prefijo" id="prefijo" value="<?= $prefijopro ?>" placeholder="Prefijo de prodcto.">
                        </div>
                        <?php
                        $chequeado = "";
                        if ($activopro == 1) {
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