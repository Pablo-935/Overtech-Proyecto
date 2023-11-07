<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequerimientoCompra extends Model
{   
    protected $table = 'requerimiento_compras';

    protected $fillable = ['fecha_requer_comp', 'estado_requer_comp', 'user_id'] ;


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


    public function DetalleRequerCompra() {
        return $this->hasMany(DetalleRequerComp::class,'requerimiento_compra_id');
    }

    public function Compra(){
        return $this->hasMany(Compra::class,'requerimiento_compra_id');
    }
    use HasFactory;
}
