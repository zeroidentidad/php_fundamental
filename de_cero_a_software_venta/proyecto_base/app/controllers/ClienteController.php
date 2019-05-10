<?php
namespace App\Controllers;

use Core\{Auth, Controller, Log};

class ClienteController extends Controller {
    private $usermodel;

    public function __construct() {
        parent::__construct();
    }

    public function getIndex() {
        return $this->render('cliente/index.twig', [
            'title' => 'Clientes'
        ]);
    }

    public function getCrud() {
        return $this->render('cliente/crud.twig', [
            'title' => 'Clientes'
        ]);
    }

    public function postCrud() {
        
    }

    public function postEliminar($id) {
        
    }
}