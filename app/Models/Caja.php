<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{   
    protected $table = "cajas";
    protected $fillable = ['numero_caja', 'saldo_inicial_caja', 'fecha_hs_aper_caja', 'fecha_hs_cier_caja',
                            'total_ingresos_caja', 'total_egresos_caja', 'total_saldo_caja', 'abierta_caja',
                            'empleado_id', ];

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function venta(){
        return $this->hasMany(Venta::class, 'caja_id');
    }

    public function Compra(){
        return $this->hasMany(Compra::class,'caja_id');
    }
    use HasFactory;
}
