<?php
namespace App\Controllers;

use App\Repositories\ProductoRepository;
use Core\{Controller};

class ProductoController extends Controller {
    private $repoProducto;

    public function __construct() {
        parent::__construct();
        $this->repoProducto = new ProductoRepository();
    }

    public function getIndex() {
        return $this->render('producto/index.twig', [
            'title' => 'Productos'
        ]);
    }

    public function postGrid() {
        print_r($this->repoProducto->listar());
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