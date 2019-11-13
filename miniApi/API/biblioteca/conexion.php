<?php

//ref: http://php.net/manual/es/mysqli.select-db.php
$con = mysqli_connect('localhost', 'remoto', 'x1234567', 'phpws1');
if (!$con) {
    die('Sin conexion a la BD. Detalle:'.mysqli_error($con));
}
//echo 'conexion ok'.'<br>';