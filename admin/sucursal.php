<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Sucursal</title>
    <?php
    include("../css.php");
    ?>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php

    include("../header.php");
    include("../menu.php");
    $cve_suc = "";
    $nom_suc = "";
    $tel_suc = "";
    $calle_suc = "";
    $col_suc = "";
    $Nint_suc = "";
    $Next_suc = "";
    $cve_muni = "";
    $cp_suc = "";


    $destino = "";
    $action_clave = true;
    include("../conexion.php");
    if (isset($_REQUEST["id_suc"])) {


        $sql = "SELECT *
from sucursal  where  MD5(id_suc)= '" . $_REQUEST["id_suc"] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $action_clave = true;
            while ($row = $result->fetch_assoc()) {
//                var_dump($row);
                $destino = "?id_suc=" . md5($row["id_suc"]);
                $cve_suc = $row["id_suc"];
                $nom_suc = $row["nom_suc"];
                $tel_suc = $row["tel_suc"];
                $calle_suc = $row["calle_suc"];
                $col_suc = $row["col_suc"];
                $Nint_suc = $row["ni_suc"];
                $Next_suc = $row["ne_suc"];
                $cve_muni = $row["cve_mun"];
                $cp_suc = $row["cp_suc"];
            }
        } else {
            echo "0 results";
        }

    } else {
        $action_clave = false;
        $sql = "SELECT s.id_suc FROM sucursal s  ORDER BY id_suc desc LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $int = (int)filter_var($row["id_suc"], FILTER_SANITIZE_NUMBER_INT);
                $int = $int + 1;
                $cve_suc = "s_0" . $int;

            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }



    ?>

    <!-- Content Wrapper. Contains page content -->
    <div body style="background-color: darkcyan" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sucursales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
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
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Alta de Nuevas Sucursales</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!--aqui poner el contenido(cuerpo) -->
                                <div class="card card-primary">
                                    <div body style="background-color: darkcyan" class="card-header">
                                        <h3 class="card-title">LLene los Siguientes datos</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="sucursalAcciones.php<?= $destino ?>" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="nombre">Municipio:</label>
                                                <select class="form-control" name="cve_m" id="cve_m">
                                                    <option value="">-- Selecciones una opcion --</option>
                                                    <?php
                                                    include("../conexion.php");
                                                    $nom_muni = "";
                                                    $sql = "SELECT nom_mun,cve_mun from municipio";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $nom_muni = $row["nom_mun"];

                                                            if ($cve_muni == $row["cve_mun"]) {
                                                                echo "<option value='" . $row["cve_mun"] . "' selected='selected'>" . $row["nom_mun"] . "</option>";
                                                            } else {
                                                                echo "<option value='" . $row["cve_mun"] . "'>" . $row["nom_mun"] . "</option>";
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
                                                <label for="Nombre">Nombre de La sucursal</label>
                                                <input type="text" class="form-control" name="nom_suc" id="nom_suc"
                                                       value="<?php echo $nom_suc; ?>"
                                                       placeholder="Nombre de la sucursal" required>
                                            </div>
                                            <div  class="form-group">
                                                <label for="s1">clave de la sucursal</label>

                                                <?php if ($action_clave === true) {
                                                    echo "<input type='text' class='form-control' name='cve_suc' id='cve_suc'
                                                       value='$cve_suc'  placeholder='clave del municipio'  required>";
                                                } else {
                                                    echo
                                                    "<input type='text' class='form-control' name='cve_suc' id='cve_suc'
                                                       value='$cve_suc'  placeholder='clave del municipio' readonly required>";
                                                } ?>
                                            </div>

                                            <div   class="form-group">
                                                <label for="clave">clave de municipio: </label>

                                                <?php if ($action_clave === true) {
                                                    echo "<input type='text' class='form-control' name='cve_muni' id='cve_muni'
                                                       value='$cve_muni'  placeholder='clave del municipio' readonly   required>";
                                                } else {
                                                    echo
                                                    "<input  type='text' class='form-control' name='cve_muni' id='cve_muni'
                                                       value='$cve_muni'  placeholder='clave del municipio' readonly required>";
                                                } ?>

                                            </div>
                                            <div class="form-group">
                                                <label for="tel">telefono: </label>
                                                <input type="text" class="form-control" name="tel_suc" id="tel_suc"
                                                       value="<?=  $tel_suc; ?>"
                                                       placeholder="telefono" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="calle">calle: </label>
                                                <input type="text" class="form-control" name="calle_suc" id="calle_suc"
                                                       value="<?php echo $calle_suc ?>"
                                                       placeholder="calle" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="col">colonia: </label>
                                            <input type="text" class="form-control" name="col_suc" id="col_suc"
                                                   value="<?php echo $col_suc ?>"
                                                   placeholder="colonia" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="Ni">Numero interior: </label>
                                                <input type="number" class="form-control" name="Nint_suc" id="Nint_suc"
                                                       value="<?php echo $Nint_suc ?>"
                                                       placeholder="numero interior" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Ne">Numero exterior: </label>
                                                <input type="number" class="form-control" name="Next_suc" id="Next_suc"
                                                       value="<?php echo $Next_suc; ?>"
                                                       placeholder="numero exterior" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cp">codigo postal: </label>
                                                <input type="number" class="form-control" name="cp_suc" id="cp_suc"
                                                       value="<?php echo $cp_suc; ?>"
                                                       placeholder="codigo postal" required>
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
<?php
include("../js.php")
?>
<script>
    $('#cve_m').on('change', function () {
        $('#cve_muni').val(this.value);
    });
</script>


</body>
</html>