<?php
namespace App\Repositories;

use Core\{Auth, Log};
use App\Helpers\{ResponseHelper,AnexGridHelper};
use App\Models\{Producto};
use Exception;

class ProductoRepository {
    private $producto;

    public function __construct(){
        $this->producto = new Producto;
    }

    public function listar() : string {
        $anexgrid = new AnexGridHelper;

        try {
            $result = $this->producto->orderBy(
                $anexgrid->columna,
                $anexgrid->columna_orden
            )->skip($anexgrid->pagina)
             ->take($anexgrid->limite)
             ->get();

            return $anexgrid->responde(
                $result,
                $this->producto->count()
            );
        } catch (Exception $e) {
            Log::error(ProductoRepository::class, $e->getMessage());
        }

        return "";
    }

/*     public function guardar(producto $model) : ResponseHelper {
        $rh = new ResponseHelper;

        try {
            $this->producto->id = $model->id;
            $this->producto->nombre = $model->nombre;
            $this->producto->direccion = $model->direccion;            

            if(!empty($model->id)){
                $this->producto->exists = true;
            }

            $this->producto->save();
            $rh->setResponse(true);
        } catch (Exception $e) {
            Log::error(ProductoRepository::class, $e->getMessage());
        }

        return $rh;
    }

    public function obtener($id) : producto {
        $producto = new producto;

        try {
            $producto = $this->producto->find($id);
        } catch (Exception $e) {
            Log::error(ProductoRepository::class, $e->getMessage());
        }

        return $producto;
    }

    public function eliminar(int $id) : ResponseHelper {
        $rh = new ResponseHelper;

        try {
            $this->producto->destroy($id);
            $rh->setResponse(true);
        } catch (Exception $e) {
            Log::error(ProductoRepository::class, $e->getMessage());
        }

        return $rh;
    } */

}