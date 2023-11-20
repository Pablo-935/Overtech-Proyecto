<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{   
    protected $table = 'empleados';

    protected $fillable = ['dni_empl', 'nombre_empl', 'apellido_empl', 'celular_empl', 'correo_empl',
                            'domicilio_empl', 'tipo_empl', 'fecha_alta_empl' , 'fecha_baja_empl',
                            'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    use HasFactory;
}
