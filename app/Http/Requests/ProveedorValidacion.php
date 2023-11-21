<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorValidacion extends FormRequest
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
            'nombre_prov' => 'required',
            'telefono_prov' => 'required',
            'direccion_prov' => 'required',
            'ubicacion_prov' => 'required',
            'correo_prov' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'nombre_prov.required' => 'El nombre es requerido',
            'telefono_prov.required' => 'El telefono es requerido',
            'direccion_prov.required' => 'La dirección es requerida',
            'ubicacion_prov.required' => 'La ubicación es requerida',
            'correo_prov.required' => 'El correo electronico es requerido',
        ];
    }    
}