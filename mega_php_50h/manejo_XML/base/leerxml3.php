<?php

$url = 'peliculas.xml';
$peliculas = simplexml_load_file($url);

//echo $peliculas->asXML();

//$peliculas->pelicula[0]->personajes->personaje[0]->nombre = 'El Bueno de la Película';

$personaje = $peliculas->pelicula[0]->personajes->addChild('personaje');
$personaje->addChild('nombre', 'El Guapo');
$personaje->addChild('actor', 'Jonhy Silver');

$puntuacion = $peliculas->pelicula[0]->addChild('puntuacion', 'Todos los públicos');
$puntuacion->addAttribute('tipo', 'clasificacion');

echo $peliculas->asXML();
