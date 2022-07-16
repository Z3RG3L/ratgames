<?php

if (!isset($_SESSION["nomusuario"])) {
    echo "<script>alert('Usuario incorrecto');window.location.href='index.php';</script>";
}