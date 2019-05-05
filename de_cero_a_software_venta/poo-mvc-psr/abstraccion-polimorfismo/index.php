<?php

require_once 'juego/Personaje.php';
require_once 'juego/personajes/Mercenario.php';
require_once 'juego/personajes/Robot.php';

//$obj = new Juego\Personaje;

use Juego\Personajes\{Mercenario, Robot};

$obj = new Mercenario();
echo $obj -> saludar();
echo $obj -> atacar();
echo '<br/>';

$obj = new Robot();
echo $obj -> saludar();
echo $obj -> atacar();

?>