<?php

namespace Juego;

abstract class Personaje{

    abstract public function saludar();

    public function atacar(){
        return 'Estoy atacando<br/>';
    }
    
}

interface IPersonaje{
    public function saludar();
    public function atacar();
}


?>