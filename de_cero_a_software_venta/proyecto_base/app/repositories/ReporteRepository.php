<?php
namespace App\Repositories;

use Core\{Log};
use App\Helpers\{AnexGridHelper};
use App\Models\{
    SqlViews\ReporteVenta
};
use Exception;

class ReporteRepository {
    private $reporte_venta;

    public function __construct(){
        $this->reporte_venta = new ReporteVenta();
    }

    public function listar() : string {
        $anexgrid = new AnexGridHelper;

        try {
            $result = $this->reporte_venta->orderBy(
                $anexgrid->columna,
                $anexgrid->columna_orden
            )->skip($anexgrid->pagina)
             ->take($anexgrid->limite)
             ->get();

            return $anexgrid->responde(
                $result,
                $this->reporte_venta->count()
            );
        } catch (Exception $e) {
            Log::error(ReporteRepository::class, $e->getMessage());
        }

        return "";
    }
}