<?php
namespace App\Controllers;

use App\Repositories\ClienteRepository;
use Core\{Controller};

class ClienteController extends Controller {
    private $clienteRepo;

    public function __construct() {
        parent::__construct();
        $this->clienteRepo = new ClienteRepository();
    }

    public function getIndex() {
        return $this->render('cliente/index.twig', [
            'title' => 'Clientes'
        ]);
    }

    public function postGrid() {
        print_r($this->clienteRepo->listar());
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