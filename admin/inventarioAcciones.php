<?php

    if (isset($_GET["idinv"])){
        if (!isset($_REQUEST["id_inv"])) {
            echo "<script>alert('error al recibir los datos');window.open('inventario.php');</script>";
        }

        var_dump($_REQUEST);
        $existprod = $_REQUEST["exist_prod"];
        $idsuc = $_REQUEST["id_suc"];
        $idprod = $_REQUEST["id_pro"];
        
        include("conexion.php");
        $sql = "update inventario set fec_inv=now(),exist_prod='$existprod',id_suc='$idsuc',id_pro='$idprod'
        where md5(id_inv) = '" . $_GET["idinv"] . "'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='inventariolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {

         include("conexion.php");

        $sql = " select cast(SUBSTRING(id_inv, 3, 20) as unsigned) as id_inv from inventario order by 1 desc limit 1";
        $result = $conn->query($sql);
        //echo "Insert";
        if ($result->num_rows > 0) {
          //  echo "<br>" . $result->num_rows;
            while ($row = $result->fetch_assoc()) {
                $int = (int)filter_var($row["id_inv"], FILTER_SANITIZE_NUMBER_INT);
                
                $int = $int + 1;
                $idinv = "i_" . $int;
                //echo $int;
                //die();
            }
        } else {
            echo "0 results";
        }

        if (!isset($_REQUEST["id_inv"])) {
                    
            $existprod = $_REQUEST["exist_prod"];
            $idsuc = $_REQUEST["cve_suc"];
            $idprod = $_REQUEST["id_pro"];

        $sql = "insert into inventario (id_inv, fec_inv, exist_prod, id_suc, id_pro) values('" . $idinv . "',now(),'" . $existprod . "' , '" . $idsuc . "','" . $idpro . "');";
        //echo ($sql);
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='inventariolst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    }

?>