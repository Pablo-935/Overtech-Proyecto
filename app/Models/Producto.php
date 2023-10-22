<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = ['codigo_prod', 'nombre_prod', 'descripcion_prod', 'precio_uni_prod',
                            'stock_min_prod', 'stock_actual_prod', 'stock_max_prod', 'imagen_prod', 'categoria_id'];

    public function categoria() {
        return $this->belongsTo(CategoriaProducto::class, 'categoria_id');
    }

    public function DetalleVenta(){
        return $this->hasMany(DetalleVenta::class, 'producto_id');
    }

    public function DetalleRequerCompra(){
        return $this->hasMany(DetalleCompra::class,'producto_id');
    }
}
