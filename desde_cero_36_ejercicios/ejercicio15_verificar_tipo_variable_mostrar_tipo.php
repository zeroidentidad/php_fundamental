<?php 

// usar tres variables y mostrar en pantalla segun el tipo que sea

$arreglo = array('hola', 1, 'culo :v');

$verdadero = TRUE;

$texto = 'Hola mundo';

if(is_array($arreglo)){ echo '$arreglo SI es array <br/>'; }
if(is_bool($verdadero)){ echo '$verdadero SI es boolean  <br/>'; }
if(is_string($texto)){ echo '$texto SI es string <br/>';  }

 ?>