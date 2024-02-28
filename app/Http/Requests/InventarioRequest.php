<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
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
            'stock' => 'required|numeric|min:0',
        ];
    }

    public function attributes(): array
    {
        return [
            'stock' => 'stock',
        ];
    }

    public function messages()
    {
        return [
            'stock.required' => 'No debe ser vacio.',
            'stock.numeric' => 'Debe ser un número.',
            'stock.min' => 'Mínimo un dígito.',
        ];
    }
}
