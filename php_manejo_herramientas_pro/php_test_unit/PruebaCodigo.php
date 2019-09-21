<?php
require './vendor/autoload.php';
require 'Codigo.php';
class PruebaCodigo extends PHPUnit_Framework_TestCase
{
    //Prueba de aserción: que se reciba un valor verdadero.
    public function testAssertion()
    {
        $valor = false;
        $this->assertTrue($valor, '- Debe ser verdadero');
    }
    //Prueba de igualdad que el valor esperado sea igual al obtenido.
    public function testSuma()
    {
        $codigo = new Codigo();
        $this->assertEquals($codigo->suma(4, 8), 12, '- Debe ser 12');
    }
}
