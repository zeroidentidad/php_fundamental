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
    
    public function getIdForViewAttribute() : string{
        if(empty($this->id)) return '';
        else return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }    

}