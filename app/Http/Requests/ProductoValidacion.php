<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoValidacion extends FormRequest
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
            'codigo_prod' => 'required',
            'nombre_prod' => 'required',
            'descripcion_prod' => 'required',
            'precio_uni_prod' => 'required',
            'stock_min_prod' => 'required',
            'stock_actual_prod' => 'required',
            'stock_max_prod' => 'required',
            'imagen_prod' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'codigo_prod.required' => 'El código es requerido',
            'nombre_prod.required' => 'El nombre es requerido',
            'descripcion_prod.required' => 'La descripción es requerida',
            'precio_uni_prod.required' => 'El precio es requerido',
            'stock_min_prod.required' => 'El stock mínimo es requerido',
            'stock_actual_prod.required' => 'El stock actual es requerido',
            'stock_max_prod.required' => 'El stock máximo es requerido',
            'imagen_prod.required' => 'La imagen es requerida',
        ];
    }    
}
