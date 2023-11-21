<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaProducto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categoria_productos';

    protected $fillable = ['nombre_cat', 'descripcion_cat'];

    // INNER JOIN con la Tabla Productos
    public function producto() {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
