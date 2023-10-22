<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{   
    protected $table = 'detalle_ventas';

    protected $fillable = ['cantidad_prod_venta', 'sub_total_det_venta', 'venta_id', 'producto_id'];

    public function venta() {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class,'producto_id');
    }
    use HasFactory;
}
