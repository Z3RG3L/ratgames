<link href="./dist/assets/bootstrap.min.css" rel="stylesheet">
<link href="./dist/assets/style.css" rel="stylesheet">
<link href="./dist/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="./dist/assets/js/jquery-1.12.4.min.js"></script>
<script src="./dist/assets/js/bootstrap.min.js"></script>
<div id="chartContainer"></div>

<?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

include(".admin/conexion.php");


$sql = "select sum(producto.prec_pro) as venta, v.fec_vta
from venta as v, inventario, sucursal, inventario_venta, producto, cliente
where
venta_inv.id_vta = v.id_vta and
cliente.id_clie = v.id_clie and
inventario.id_inv = inventario_venta.id_inv and producto.id_pro = inventario.id_pro and
sucursal.id_suc = inventario.id_suc and fec_vta >= '20220501' group by v.fec_vta";

$result = $conn->query($sql);
$Datos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $Datos[] = array("y" => $row["venta"], "label" =>  date("Y-m-d", strtotime($row["fec_vta"])));
        // array("y" => 268.46, "label" => "2022-07-08")
        // ara
    }
}
console_log($Datos);
echo "<br>";

?>

<script type="text/javascript">
    $(function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "dark2", //"light1", "light2", "dark1", "dark2"
            animationEnabled: true,
            title: {
                text: ""
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($Datos, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    });
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>