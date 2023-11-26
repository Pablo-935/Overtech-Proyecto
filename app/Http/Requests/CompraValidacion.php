<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraValidacion extends FormRequest
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
            'fecha_comp' => 'required',
            'hora_comp' => 'required',
            'monto_comp' => 'required|numeric|between:0.01,9999999.99',
            'detalle' => 'required',
            'filas' => 'required',
        ];
    }

    public function messages():array{
        return [
            'fecha_comp.required' => 'La Fecha es Requerida',
            'hora_comp.required' => 'El Estado es Requerido',
            'monto_comp.required' => 'Ingrese el monto de la compra',
            'monto_comp.numeric' => 'Solo se permite numeros',
            'monto_comp.between' => 'Superaste el rango de numeros',
            'detalle.required' => 'El detalle es requerido',
            'filas.required' => 'Debe haber un requerimiento asignado',
        ];
    }
}
