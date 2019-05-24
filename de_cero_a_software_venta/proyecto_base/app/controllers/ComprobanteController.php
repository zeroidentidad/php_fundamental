<?php
namespace App\Controllers;

use App\Models\Comprobante;
use App\Models\ComprobanteDetalle;
use App\Repositories\ComprobanteRepository;
use Core\{Controller};
use Dompdf\Dompdf;
use Dompdf\Exception;

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
            'title' => 'Comprobantes',
            'model' => $this->comprobanteRepo->obtener($id)
        ]);
    }

    public function getPdf($id) {
        $model = $this->comprobanteRepo->obtener($id);

        if($model->anulado === 1) {
            throw new Exception("COMPROBANTE ANULADO");
        }

        $dompdf = new Dompdf();
        $dompdf->loadHtml(
            $this->render('comprobante/pdf.twig', [
                'model' => $model
            ])
        );

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('comprobante-' . $model->idForView);
    }

    public function postAnular(){
        print_r(
            json_encode(
                $this->comprobanteRepo->anular($_POST['id'])
            )
        );
    }

    public function postGenerar(){
        $model = new Comprobante();
        $model->cliente_id = $_POST['cliente_id'];

        $detalle = [];

        foreach($_POST['detalle'] as $d) {
            // comprobante_id, producto_id, cantidad, costo, precio
            $d = (object)$d;

            $cd = new ComprobanteDetalle();
            $cd->producto_id = $d->id;
            $cd->cantidad = $d->cantidad;
            $cd->costo = $d->costo;
            $cd->precio = $d->precio;

            $detalle[] = $cd;
        }

        print_r(
            json_encode(
                $this->comprobanteRepo->generar($model, $detalle)
            )
        );
    }    

}