<?php

require_once './inc/conexion.inc.php';

$conecta = conectar();

if ($conecta!=null){
    echo "<h3>Conexion correcta</h3>";
}