<?php

class Fruta
{
    private $nombre;
    
    public function comer()
    {
        echo 'Buen provecho<br/>';
    }
}

class Pera extends Fruta
{
    public function comer()
    {
        echo 'Que disfrutes de la pera de agua<br/>';
    }
}


$fruta = new Fruta();
$fruta->comer();

$pera = new Pera();
$pera->comer();


?>







