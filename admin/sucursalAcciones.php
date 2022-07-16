<?php
if (isset($_REQUEST["acc"]) =="elimina") {
    include ("../conexion.php");
    $sql="Delete  From sucursal Where md5(id_suc)='{$_REQUEST["id_suc"]}'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='sucursalst.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

else{
    if (isset($_GET["id_suc"])){
        if (!isset($_REQUEST["nom_suc"])) {
            echo "<script>alert('error al recibir los datos');window.open('sucursal.php');</script>";
        }
        $cve_suc = $_REQUEST["id_suc"];
        $nom_suc=$_REQUEST["nom_suc"];
        $tel_suc=$_REQUEST["tel_suc"];
        $calle_suc=$_REQUEST["calle_suc"];
        $col_suc=$_REQUEST["col_suc"];
        $Nint_suc=$_REQUEST["ni_suc"];
        $Next_suc=$_REQUEST["ne_suc"];
        $cve_muni=$_REQUEST["cve_mun"];
        $cp_suc=$_REQUEST["cp_suc"];
        include("../conexion.php");
        $sql = "update sucursal set id_suc='$cve_suc', nom_suc='$nom_suc'
                    ,tel_suc='$tel_suc',calle_suc='$calle_suc',col_suc='$col_suc',ni_suc='$Nint_suc',ne_suc='$Next_suc'
                ,cp_suc='$cp_suc'
                where md5(id_suc)= '".$_GET["id_suc"]."'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='sucursalst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    else{
        if (!isset($_REQUEST["nom_suc"])) {

            echo "<script>alert('error al recibir los datos');window.open('./sucursal.php');</script>";
        }
        $cve_suc = $_REQUEST["id_suc"];
        $nom_suc=$_REQUEST["nom_suc"];
        $tel_suc=$_REQUEST["tel_suc"];
        $calle_suc=$_REQUEST["calle_suc"];
        $col_suc=$_REQUEST["col_suc"];
        $Nint_suc=$_REQUEST["ni_suc"];
        $Next_suc=$_REQUEST["ne_suc"];
        $cve_muni=$_REQUEST["cve_mun"];
        $cp_suc=$_REQUEST["cp_suc"];

        include("../conexion.php");
        $sql = "insert into sucursal (id_suc,nom_suc,tel_suc,calle_suc,col_suc,ni_suc,ne_suc,cve_mun,cp_suc)
values('" . $cve_suc . "','" . $nom_suc . "','".$tel_suc ."','" .  $calle_suc . "','" .  $col_suc . "','" .  $Nint_suc . "','" .  $Next_suc . "','" .  $cve_muni . "','" .  $cp_suc . "')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='sucursalst.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>