<?php

$url = 'peliculas.xml';

//Para acceder a un elemento específico
//$peliculas = simplexml_load_file($url);
//echo $peliculas->pelicula[0]->argumento;
//echo '<br/>';

//Para acceder a un elemento XML con caracteres no permitidos por PHP
//$peliculas = simplexml_load_file($url);
//echo $peliculas->pelicula->{'grandes-frases'}->frase;

//Acceder a la puntuación
$peliculas = simplexml_load_file($url);
foreach ($peliculas->pelicula[0]->puntuacion as $puntuacion) {
    switch ((string) $puntuacion['tipo']) {
        case 'votos':
            echo $puntuacion, ' votos positivos<br/>';
            break;
            
        case 'estrellas':
            echo $puntuacion, ' estrellas<br/>';
            break;
    }
}

//Comparar elementos y atributos con texto
if ((string) $peliculas->pelicula->titulo == 'Lo que el Viento se Llevó') {
    print 'Mi película favorita: ';
}
echo htmlentities((string) $peliculas->pelicula->titulo);
