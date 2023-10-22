<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRequerComp extends Model
{   
    protected $table = 'detalle_requer_compras';

    protected $fillable = ['cantidad_requer_prod', 'requerimiento_compra_id', 'producto_id'];


    public function RequerimientoCompra(){
        return $this->belongsTo(RequerimientoCompra::class, 'requerimiento_compra_id');
    }

    public function Producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }
    use HasFactory;
}
