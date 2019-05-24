<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComprobanteDetalle extends Model{
    protected $table = 'comprobante_detalle';

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto');
    }

}