<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoriaRequest extends FormRequest
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
        $id = $this->id;

        if ($id) {
            return [
                'nombre' => 'required|min:3|max:255|unique:categorias,nombre,' . $id,
                'slug' => 'required|min:3|max:255|unique:categorias,slug,' . $id,
                'descripcion' => 'required|min:3|max:255',
            ];
        } else {
            return [
                'nombre' => 'required|min:3|max:255|unique:categorias',
                'slug' => 'required|min:3|max:255|unique:categorias',
                'descripcion' => 'required|min:3|max:255',
            ];
        }
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'slug' => 'url',
            'descripcion' => 'descripción',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'No debe ser vacio.',
            'nombre.min' => 'Más de :min dígitos.',
            'nombre.max' => 'Menos de :max dígitos',
            'nombre.unique' => 'Este :attribute ya existe',

            'slug.required' => 'No debe ser vacio.',
            'slug.min' => 'Más de :min dígitos.',
            'slug.max' => 'Menos de :max dígitos',
            'slug.unique' => 'Este :attribute ya existe',

            'descripcion.required' => 'No debe ser vacio.',
            'descripcion.min' => 'Más de :min dígitos.',
            'descripcion.max' => 'Menos de :max dígitos'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}
