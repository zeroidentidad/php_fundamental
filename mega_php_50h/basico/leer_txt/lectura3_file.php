<?php

// la funcion file permite leer el contenido de un archivo y devuelve el contenido en una tabla, fila por fila

$tabla = file('archivo.txt');

foreach ($tabla as  $linea) {
    echo $linea."<br/>";
}