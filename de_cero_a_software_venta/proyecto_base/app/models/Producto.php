<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model{
    protected $table = 'producto';

    public function getMargenAttribute() : float{
        $ingreso = $this->precio - $this->costo;
        return round($ingreso / $this->costo * 100, 0);
    }

    public function getTieneFotoAttribute() : string{
        return empty($this->foto) ? 'No' : 'Si';
    }    

}