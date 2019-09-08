<?php
class DBSys {

    private static $instancia;

    protected function __construct(){
        echo 'Conectando a DB...';
    }

    public static function getInstancia(){
        if(static::$instancia === null){
            static::$instancia = new static();
            echo 'Creando nueva instancia...';
        }
        return static::$instancia;
    }

    private function __clone(){

    }
}

class DBEngine extends DBSys {

}

$instanciaDBEngine = DBSys::getInstancia();
var_dump($instanciaDBEngine === DBSys::getInstancia());

$instanciaDBEngine2 = DBEngine::getInstancia();
var_dump($instanciaDBEngine2 === $instanciaDBEngine);
//no puede ser accedida aunque se herede al no existir para ser compartida en otras clases
