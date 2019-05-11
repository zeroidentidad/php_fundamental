<?php
namespace App\Controllers;

use Core\{Controller};

class ProductoController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function getIndex() {
        return $this->render('producto/index.twig', [
            'title' => 'Productos'
        ]);
    }

    public function getCrud() {
        return $this->render('producto/crud.twig', [
            'title' => 'Productos'
        ]);
    }

    public function getImportar() {
        
    }

    public function getExportar() {
        
    }

    public function postCrud() {
        
    }

    public function postEliminar($id) {
        
    }
}