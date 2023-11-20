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
            'dni_venta' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'dni_venta.required' => 'El DNI venta es requerido',
        ];
    }
}
