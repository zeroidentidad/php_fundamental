<?php
require("calendario.php");
$mes = $_GET['mes'];
$anio = $_GET['anio'];
//$dia = 1;
calendar ($mes, $anio);
?>