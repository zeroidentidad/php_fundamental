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
}