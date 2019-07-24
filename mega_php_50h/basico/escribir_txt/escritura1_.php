<?php
// Posibilidad de modificar los permisos de usuario webserver: chmod($ruta, 0777); u: fopen ('r+')

$src = fopen('archivo2.txt', 'r+'); if(!$src){ echo 'problema abriendo archivo'; } //opcional

$contenido = 'Hola que ondas mundos otro :v';

file_put_contents('archivo2.txt', $contenido);

fclose($src);