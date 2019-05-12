<?php
namespace App\Repositories;

use Core\{Auth, Log};
use App\Helpers\{ResponseHelper,AnexGridHelper};
use App\Models\{Cliente};
use Exception;

class ClienteRepository {
    private $cliente;

    public function __construct(){
        $this->cliente = new Cliente;
    }

    public function listar() : string {
        $anexgrid = new AnexGridHelper;

        try {
            $result = $this->cliente->orderBy(
                $anexgrid->columna,
                $anexgrid->columna_orden
            )->skip($anexgrid->pagina)
             ->take($anexgrid->limite)
             ->get();

            return $anexgrid->responde(
                $result,
                $this->cliente->count()
            );
        } catch (Exception $e) {
            Log::error(ClienteRepository::class, $e->getMessage());
        }

        return "";
    }


}