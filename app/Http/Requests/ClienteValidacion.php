<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteValidacion extends FormRequest
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
            'cuit_cli' => 'required',
            'nombre_cli' => 'required',
            'celular_cli' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'cuit_cli.required' => 'El cuit es requerido',
            'nombre_cli.required' => 'El nombre es requerido',
            'celular_cli.required' => 'El celular es requerido',
        ];
    }    
}
