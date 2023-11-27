<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{   
    protected $table = 'compras';

    protected $fillable = ['num_comp', 'monto_comp', 'fecha_comp', 'hora_comp',  'operador', 'detalle', 'caja_id', 'proveedor_id', 'requerimiento_compra_id'];
    
    public function caja(){
        return $this->belongsTo(Caja::class, 'caja_id');
    }
    
    public function proveedor(){
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function RequerimientoCompra(){
        return $this->belongsTo(RequerimientoCompra::class,'requerimiento_compra_id');
    }
    use HasFactory;
}
