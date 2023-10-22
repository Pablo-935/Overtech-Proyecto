<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequerimientoCompra extends Model
{   
    protected $table = 'requerimiento_compras';

    protected $fillable = ['fecha_requer_comp', 'estado_requer_comp', 'empleado_id'] ;


    public function Empleado(){
        return $this->belongsTo( Empleado::class,'empleado_id');
    }


    public function DetalleRequerCompra() {
        return $this->hasMany(DetalleRequerComp::class,'requerimiento_compra_id');
    }

    public function Compra(){
        return $this->hasMany(Compra::class,'requerimiento_compra_id');
    }
    use HasFactory;
}
