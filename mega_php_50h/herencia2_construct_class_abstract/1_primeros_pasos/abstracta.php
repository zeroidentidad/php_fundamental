<?php

abstract class Fruta
{
    private $nombre;
    
    abstract public function comer();
}

class Pera extends Fruta
{
    public function comer()
    {
        echo 'Que disfrutes de la pera de agua<br/>';
    }
}

class Manzana extends Fruta
{
    public function comer()
    {
        echo 'Come manzanas y bebe mucha sidra. Eso es salud<br/>';
    }
}


$pera = new Pera();
$pera->comer();

$manzana = new Manzana();
$manzana->comer();


?>







