<?php
namespace App\Repositories;

use Core\{Auth, Log};
use App\Helpers\{ResponseHelper,AnexGridHelper};
use App\Models\{Comprobante};
use Exception;

class ComprobanteRepository {
    private $comprobante;

    public function __construct(){
        $this->comprobante = new Comprobante;
    }

    public function listar() : string {
        $anexgrid = new AnexGridHelper;

        try {
            $result = $this->comprobante->orderBy(
                $anexgrid->columna,
                $anexgrid->columna_orden
            )->skip($anexgrid->pagina)
             ->take($anexgrid->limite)
             ->get();

            foreach($result as $r) {
                $r->cliente = $r->cliente;
            }

            return $anexgrid->responde(
                $result,
                $this->comprobante->count()
            );
        } catch (Exception $e) {
            Log::error(ComprobanteRepository::class, $e->getMessage());
        }

        return "";
    }

    public function anular(int $id) : ResponseHelper {
        $rh = new ResponseHelper;

        try {
            $this->comprobante->id = $id;
            $this->comprobante->anulado = 1;
            $this->comprobante->exists = true;

            $this->comprobante->save();
            $rh->setResponse(true);
        } catch (Exception $e) {
            Log::error(ComprobanteRepository::class, $e->getMessage());
        }

        return $rh;
    }

    public function generar(Comprobante $model, array $detalle) : ResponseHelper {
        $rh = new ResponseHelper;

        try {
            //cliente_id, sub_total, iva, total, fecha, anulado
            $model->sub_total = 0;
            $model->iva = 0;
            $model->total = 0;
            $model->fecha = date('Y-m-d');
            $model->anulado = 0;

            // orden, total, cantidad, precio, costo, comprobante_id
            foreach($detalle as $k => $d) {
                $d->orden = $k;
                $d->total = $d->cantidad * $d->precio;
                $model->total += $d->total;
            }

            // SubTotal
            $model->sub_total = $model->total / 1.16;
            $model->iva = $model->total - $model->sub_total;

            // Genera el comprobante
            $model->save();

            // Guarda el detalle
            $model->detalle()->saveMany($detalle);

            $rh->setResponse(true);
        } catch (Exception $e) {
            Log::error(ProductoRepository::class, $e->getMessage());
        }

        return $rh;
    }

}