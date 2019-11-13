<?php
require_once 'conexion.php';

header('Content-Type: application/json');

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

function mostrar_titulos($detalle, $con)
{
    if ($detalle == 'lista') {
        $sql1 = 'SELECT titulo FROM libros';
        $resultado = mysqli_query($con, $sql1) or die(mysqli_error($con));
    } else {
        $sql2 = 'SELECT titulo FROM libros where id='.$detalle;
        $resultado = mysqli_query($con, $sql2) or die(mysqli_error($con));
    }
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $todos_los_titulos[] = $fila;
    }
    //print_r($todos_los_titulos);
    return $todos_los_titulos;
}

function mostrar_autores($detalle, $con)
{
    if ($detalle == 'lista') {
        $sql = 'SELECT autor FROM libros';
        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
    } else {
        $sql_n = 'SELECT autor FROM libros where id='.$detalle;
        $resultado = mysqli_query($con, $sql_n) or die(mysqli_error($con));
    }
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $todos_los_autores[] = $fila;
    }
    //print_r($todos_los_autores);
    return $todos_los_autores;
}

function guardar_nuevo_autor($con)
{
  mysqli_query($con,"INSERT INTO libros (autor,titulo) VALUES ('".$_POST['autor']."','".$_POST['titulo']."')");
  header('location:../../../');
  exit;
}

if ($_GET['peticion'] == 'titulo') {
    $resultado = mostrar_titulos($_GET['detalle'], $con);
} elseif ($_GET['peticion'] == 'autor') {

    if ($_GET['detalle'] == 'nuevo') {
        guardar_nuevo_autor($con);
    } else {
        $resultado = mostrar_autores($_GET['detalle'], $con);
    }

} else {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

echo json_encode($resultado);