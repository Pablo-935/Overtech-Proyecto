<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;

    protected $table = 'categoria_productos';

    protected $fillable = ['nombre_cat', 'descripcion_cat'];

    // INNER JOIN con la Tabla Productos
    public function producto() {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
