<?php

namespace Juego\Personajes;

use Juego\IPersonaje;

class Robot implements IPersonaje{

   public function saludar(){
        return 'Bibop bibi bob<br/>';
    }

    public function atacar(){
        return 'Estoy atacando con rayo laser<br/>';
    }    
    
}

?>