<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequerimientoCompraValidacion extends FormRequest
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
            'fecha_requer_comp' => 'required',
            'estado_requer_comp' => 'required',
            'usuario_id' => 'required',
            'filas' => 'required'
        ];
    }

    public function messages():array{
        return [
            'fecha_requer_comp.required' => 'La Fecha es Requerida',
            'estado_requer_comp.required' => 'El Estado es Requerido',
            'usuario_id.required' => 'El Usuario es Requerido',
            'filas.required' => 'Debe haber al menos una fila'
        ];
    }
}
