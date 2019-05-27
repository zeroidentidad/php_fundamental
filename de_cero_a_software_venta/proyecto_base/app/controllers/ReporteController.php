<?php
namespace App\Controllers;

use App\Repositories\ReporteRepository;
use Core\{Auth, Controller, Log};

class ReporteController extends Controller {
    private $reporteRepo;

    public function __construct() {
        parent::__construct();
        $this->reporteRepo = new ReporteRepository();
    }

    public function getVentas() {
        return $this->render('reporte/ventas.twig', [
            'title' => 'Reporte'
        ]);
    }

    public function getProductos() {
        return $this->render('reporte/productos.twig', [
            'title' => 'Reporte'
        ]);
    }

    public function postVentas_grid() {
        print_r(
            $this->reporteRepo->ventasPorMes()
        );
    }
    
    public function postProductos_grid($y, $m) {
        print_r(
            $this->reporteRepo->productosPorMes($y, $m)
        );
    }
    
    public function getAnios() {
        print_r(
            json_encode(
                $this->reporteRepo->anios()
            )
        );
    }    

}