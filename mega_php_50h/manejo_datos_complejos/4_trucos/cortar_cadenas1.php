<?php

$texto = 'Don Quijote de la Manchaa es una novela escrita por el español Miguel de Cervantes Saavedra. Publicada su primera parte con la titulación de El ingenioso hidalgo don Quijote de la Mancha a comienzos de 1605, es la obra más destacada de la literatura española y una de las principales de la literatura universal.1 2 En 1615 apareció su continuación con el título de Segunda parte del ingenioso caballero don Quijote de la Mancha. El Quijote de 1605 se publicó dividido en cuatro partes; pero al aparecer el Quijote de 1615 en calidad de Segunda parte de la obra, quedó revocada de hecho la partición en cuatro secciones del volumen publicado diez años antes por Cervantes.';

$texto_limitado = substr($texto,0,135);

echo "<h1>Versión completa:</h1>";
echo $texto. "...";

echo "<h1>Versión reducida:</h1>";
echo $texto_limitado. "...";

?>