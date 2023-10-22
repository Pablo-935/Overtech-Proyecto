<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{   
    protected $table = 'cotizaciones';

    protected $fillable = ['nombre_cotizacion', 'valor_cotizacion'];
    use HasFactory;
}
