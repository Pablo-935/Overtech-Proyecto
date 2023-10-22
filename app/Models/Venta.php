<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{       
    protected $table = 'ventas';

    protected $fillable = ['dni_venta', 'fecha_venta', 'hora_venta', 'total_venta', 'estado_venta',
                            'empleado_id', 'caja_id', 'cliente_id'];

    public function empleado() {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function caja() {
        return $this->belongsTo(Caja::class,'caja_id');
    }


    public function DetalleVenta(){
        return $this->hasMany(DetalleVenta::class,'venta_id');
    }
    use HasFactory;
}
