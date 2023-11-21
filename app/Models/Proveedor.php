<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{   
    protected $table = 'proveedores';

    protected $fillable = ['nombre_prov', 'telefono_prov', 'direccion_prov', 'ubicacion_prov', 'correo_prov'];
    
    public function Compra(){
        return $this->hasMany(Compra::class, 'proveedor_id');
    }
    
    use HasFactory;
    use SoftDeletes;


}
