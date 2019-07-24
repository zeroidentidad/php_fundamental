<?php

$archivo = 'archivo.txt';

//la funcion readfile() devuelve el num de caracteres de un archivo y muestra automaticamente el contenido
$numero = readfile($archivo); //muestra

echo "<br/> El numero de caracteres es: ".$numero;