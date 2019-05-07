<?php
namespace App\Controllers;

class HomeController {

    private $empleado;

    public function __construct(){
        $this->empleado = new \App\Models\Empleado;

        var_dump($this->empleado);
    }

    public function index() {
        //var_dump(\Core\Database::getConnection());
        $modelo = $this->empleado->listar();
        //var_dump($empleados);

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