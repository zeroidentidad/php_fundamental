<?php
namespace App\Controllers;

class HomeController {

    private $empleado;

    public function __construct(){
        $this->empleado = new \App\Models\Empleado;

        //var_dump($this->empleado);
    }

    public function index() {
        //var_dump(\Core\Database::getConnection());

        //$modelo1 = $this->empleado->obtener(5);
        //var_dump($modelo1);
        
        $nuevoRegistro = new \App\Models\Empleado;
        $nuevoRegistro->nombre = 'Jesus Antonio';
        $nuevoRegistro->apellido = 'Ferrer';
        $nuevoRegistro->fecha_nacimiento = '1992-08-27';
        $nuevoRegistro->profesion_id = 9;
        $nuevoRegistro->id = 6;

        $modelo2 = $this->empleado->guardar($nuevoRegistro);
        var_dump($modelo2);

        $modelo = $this->empleado->listar();

        require_once _VIEW_PATH_ . 'header.php';
        require_once _VIEW_PATH_ .'home/index.php';
        require_once _VIEW_PATH_ . 'footer.php';
    }

    public function test(){
        require_once _VIEW_PATH_ . 'header.php';
        require_once _VIEW_PATH_ .'home/test.php';
        require_once _VIEW_PATH_ . 'footer.php';
    }

    public function hello() {
        echo 'hello world';
    }
}