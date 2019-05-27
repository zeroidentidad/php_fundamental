<?php
namespace App\Repositories;

use Core\{Log};
use App\Helpers\{AnexGridHelper};
use App\Models\{
    SqlViews\ReporteVenta,
    SqlViews\ReporteProducto
};
use Exception;

class ReporteRepository {
    private $reporte_venta;
    private $reporte_producto;

    public function __construct(){
        $this->reporte_venta = new ReporteVenta();
        $this->reporte_producto = new ReporteProducto();
    }

    public function ventasPorMes() : string {
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

    public function productosPorMes($y, $m) : string {
        $anexgrid = new AnexGridHelper;

        try {
            $result = $this->reporte_producto->orderBy(
                $anexgrid->columna,
                $anexgrid->columna_orden
            )->where('anio', $y)
                ->where('mes', $m)
                ->skip($anexgrid->pagina)
                ->take($anexgrid->limite)
                ->get();

            return $anexgrid->responde(
                $result,
                $this->reporte_producto->count()
            );
        } catch (Exception $e) {
            Log::error(ReporteRepository::class, $e->getMessage());
        }

        return "";
    }
    
    public function anios() : array {
        $result = [];

        try {
            $result = $this->reporte_producto
                           ->orderBy('anio')
                           ->get()
                           ->toArray();                  
        } catch (Exception $e) {
            Log::error(ReporteRepository::class, $e->getMessage());
        }

        return $result;
    }    

}