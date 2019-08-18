<?php

require("ArrayUtils.php");

$arrProfesiones = array("Doctor","Contador","Arquitecto","Diseñador","Administador");

$arrayUtils = new ArrayUtils($arrProfesiones);

echo 'ARRAY';
echo "<pre>";
print_r ($arrayUtils->verArray());
echo "</pre>";

$arrayUtils->agregarElemento('Informático');

echo 'AGREGAR ELEMENTO AL FINAL';
echo "<pre>";
print_r ($arrayUtils->verArray());
echo "</pre>";

$arrayUtils->agregarElemento('Mecanico','4');

echo 'AGREGAR ELEMENTO EN LA POSICIÓN 4';
echo "<pre>";
print_r ($arrayUtils->verArray());
echo "</pre>";

$arrayUtils->eliminarElemento(2);

echo 'ELIMINAR EL ELEMENTO 2';
echo "<pre>";
print_r ($arrayUtils->verArray());
echo "</pre>";

?>