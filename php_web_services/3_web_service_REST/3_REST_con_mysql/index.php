<?php

$publicacionURL = 'http://localhost:8080/php_web_services/3_web_service_REST/3_REST_con_mysql/API/biblioteca/titulo/lista';
$autorURL = 'http://localhost:8080/php_web_services/3_web_service_REST/3_REST_con_mysql/API/biblioteca/autor/lista';

$publicacionJson = file_get_contents($publicacionURL);
$autorJson = file_get_contents($autorURL);
$publicacion = json_decode($publicacionJson);
$autor = json_decode($autorJson);

echo 'Autores '. count($autor);
echo '<ul>';
foreach ($autor as $value) {
    echo '<li>' . $value->autor . '</li>';
}
echo '</ul>';

echo 'Libros '. count($publicacion);
echo '<ul>';
foreach ($publicacion as $value) {
    echo '<li>' . $value->titulo . '</li>';
}
echo '</ul>';
