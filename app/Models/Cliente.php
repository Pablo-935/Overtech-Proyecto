<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{   
    protected $table = 'clientes';

    protected $fillable = ['cuit_cli', 'nombre_cli', 'celular_cli'];


    public function venta(){
        return $this->hasMany(Venta::class, 'cliente_id');
    }
    use HasFactory;
    use SoftDeletes;
}
