<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaValidacion extends FormRequest
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
            'nombre_cat' => 'required',
            'descripcion_cat' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'nombre_cat.required' => 'El nombre es requerido',
            'descripcion_cat.required' => 'La descripción es requerida',
        ];
    }    
}