<link href="/dist/assets/bootstrap.min.css" rel="stylesheet">
<link href="/dist/assets/style.css" rel="stylesheet">
<link href="/dist/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="/dist/assets/js/jquery-1.12.4.min.js"></script>
<script src="/dist/assets/js/bootstrap.min.js"></script>

<div id="chartContainer"></div>
<h1>Gráfica de ingresos al mes por sucursal:
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

    include("/admin/conexion.php");
    $sql = "select sum(producto.prec_pro) as venta, sucursal.nom_suc
    from venta as v, inventario, sucursal, inventario_venta, producto, cliente
    where
    inventario_venta.id_vta = v.id_vta and
    cliente.id_clie = v.id_clie and
    inventario.id_inv = inventario_venta.id_inv and producto.id_pro = inventario.id_pro and
    sucursal.id_suc = inventario.id_suc and fec_vta >= '20220201' group by sucursal.nom_suc;";
    print_r("$sql");
    die();

    $result = $conn->query($sql);
    $Datos = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $Datos[] = array("y" => $row["venta"], "legendText" =>  $row["nom_suc"], "label" => $row["nom_suc"]);
      // Array("y" => 685.04, "LegendText" => "Querétaro", "label" => "Querétaro")
        }
    }
    console_log($Datos);
    echo "<br>";
    ?>

    <script type="text/javascript">
        $(function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: ""
                },
                animationEnabled: true,
                legend: {
                    verticalAlign: "center",
                    horizontalAlign: "left",
                    fontSize: 20,
                    fontFamily: "Helvetica"
                },
                theme: "dark1", //ligth1, "ligth2", dark1, dark2
                data: [{
                    type: "pie",
                    indexLabelFontFamily: "Garamond",
                    indexLabelFontSize: 20,
                    indexLabel: "{label} ${y}",
                    startAngle: -20,
                    showInLegend: true,
                    toolTipContent: "{legendText} ${y}",
                    dataPoints: <?php echo json_encode($Datos, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        });
    </script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>