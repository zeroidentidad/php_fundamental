<?php
namespace App\Controllers;

use App\Repositories\ComprobanteRepository;
use Core\{Controller};

class ComprobanteController extends Controller {
    private $comprobanteRepo;

    public function __construct() {
        parent::__construct();
        $this->comprobanteRepo = new ComprobanteRepository();
    }

    public function getIndex() {
        return $this->render('comprobante/index.twig', [
            'title' => 'Comprobantes'
        ]);
    }

    public function postGrid() {
        print_r($this->comprobanteRepo->listar());
    }

    public function getNuevo() {
        return $this->render('comprobante/nuevo.twig', [
            'title' => 'Comprobantes'
        ]);
    }

    public function getDetalle($id) {
        return $this->render('comprobante/detalle.twig', [
            'title' => 'Comprobantes'
        ]);
    }

    public function getPdf($id) {
        
    }

    public function postAnular(){
        print_r(
            json_encode(
                $this->comprobanteRepo->anular($_POST['id'])
            )
        );
    }
}