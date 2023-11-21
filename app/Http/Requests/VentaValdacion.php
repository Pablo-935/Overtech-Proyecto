<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaValdacion extends FormRequest
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
            'dni_venta' => ['required', 'numeric', 'min:100', 'max:999'],
            'contador' => ['min:1'],

            
        ];
    }
    
    public function messages()
    {
        return [
            'dni_venta.required' => 'El DNI es obligatorio y debe tener solo 3 numeros',
            'dni_venta.numeric' => 'El DNI debe ser un número',
            'dni_venta.min' => 'El DNI debe tener al menos 3 números',
            'dni_venta.max' => 'El DNI no puede tener más de 3 números',
            'contador.min' => 'Debe registrar almenos 1 venta',

        ];
    }
    
}
