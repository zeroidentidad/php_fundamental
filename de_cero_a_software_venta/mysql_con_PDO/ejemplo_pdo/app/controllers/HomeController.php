<?php
namespace App\Controllers;

class HomeController {

    private $empleado;

    public function __construct(){
        $this->empleado = new \App\Models\Empleado;
        $this->profesion = new \App\Models\Profesion;
        //var_dump($this->empleado);
    }

    public function index() {

        $modelo = $this->empleado->listar();

        require_once _VIEW_PATH_ . 'header.php';
        require_once _VIEW_PATH_ .'home/index.php';
        require_once _VIEW_PATH_ . 'footer.php';
    }

    public function crud() {
        
        $modelo = new \App\Models\Empleado;
        $profesiones = $this->profesion->listar();

        if(!empty($_GET['id'])){
            $modelo = $this->empleado->obtener($_GET['id']);
        }

        $nuevo = empty($modelo->id);
      /*$modelo = $this->empleado->listar();*/

        require_once _VIEW_PATH_ . 'header.php';
        require_once _VIEW_PATH_ .'home/crud.php';
        require_once _VIEW_PATH_ . 'footer.php';
    }

    public function guardar() {

        $modelo = new \App\Models\Empleado;
        $modelo->id = $_POST['id'];
        $modelo->nombre = $_POST['nombre'];
        $modelo->apellido = $_POST['apellido'];
        $modelo->fecha_nacimiento = $_POST['fecha_nacimiento'];
        $modelo->profesion_id = $_POST['profesion_id'];

        $resultado = $this->empleado->guardar($modelo);

        if(!$resultado) {
            throw new Exception('No se pudo realizar la operación');
        } else {
            header('location: ?c=Home');
        }
    }
    
    public function eliminar() {
        
        $id = $_GET['id'];

        $resultado = $this->empleado->eliminar($id);

        if(!$resultado) {
            throw new Exception('No se pudo realizar la operación');
        } else {
            header('location: ?c=Home');
        }
    }   

}