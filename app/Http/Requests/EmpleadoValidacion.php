<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoValidacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dni_empl' => 'required',
            'nombre_empl' => 'required',
            'apellido_empl' => 'required',
            'celular_empl' => 'required',
            'correo_empl' => 'required',
            'domicilio_empl' => 'required',
            'tipo_empl' => 'required',
            'usuario_empl' => 'required',
            'fecha_alta_empl' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'dni_empl.required' => 'El DNI es requerido',
            'nombre_empl.required' => 'El nombre es requerido',
            'apellido_empl.required' => 'El apellido es requerido',
            'celular_empl.required' => 'El celular es requerido',
            'correo_empl.required' => 'El correo es requerido',
            'domicilio_empl.required' => 'El domicilio es requerido',
            'tipo_empl.required' => 'El tipo de empleado es requerido',
            'usuario_empl.required' => 'El id del usuario es requerido',
            'fecha_alta_empl.required' => 'La fecha de alta es requerida',
        ];
    }    
}

