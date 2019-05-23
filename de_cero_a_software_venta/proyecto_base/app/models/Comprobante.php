<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model{
    protected $table = 'comprobante';

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function detalle(){
        return $this->hasMany('App\Models\ComprobanteDetalle');
    }    

}