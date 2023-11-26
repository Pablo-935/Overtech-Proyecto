<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CajaValidacion extends FormRequest
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
            'saldo_inicial_caja' => ['required', 'numeric'],
            'total_saldo_caja' => ['required', 'numeric'],

            
        ];
    }
    
    public function messages()
    {
        return [
            'saldo_inicial_caja.required' => 'Este campo es obligatorio',
            'saldo_inicial_caja.numeric' => 'Por favor solo ingrese numeros',

            'total_saldo_caja.required' => 'Este campo es obligatorio',
            'total_saldo_caja.numeric' => 'Por favor solo ingrese numeros',

        ];
    }
}
