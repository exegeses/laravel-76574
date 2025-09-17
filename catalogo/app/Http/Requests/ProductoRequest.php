<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            //'prdNombre'=>'required|unique:productos,prdNombre|min:2|max:45',
            'prdNombre' => 'required|'.Rule::unique('productos','prdNombre')
                                ->ignore($request->idProducto, 'idProducto').'|min:2|max:45',
            'prdPrecio'=>'required|numeric|min:0',
            'idMarca'=>'required|exists:marcas,idMarca',
            'idCategoria'=>'required|exists:categorias,idCategoria',
            'prdDescripcion'=>'required|min:5|max:1000',
            'prdImagen'=>'mimes:jpeg,jpg,webp,svg,gif|max:2048'
        ];
    }

    public function messages() : array
    {
        return [
            'prdNombre.required' => 'El campo "Nombre del producto" es obligatorio.',
            'prdNombre.unique' => 'El campo "Nombre del producto" ya existe.',
            'prdNombre.min'=>'El campo "Nombre del producto" debe tener como mínimo 2 caractéres.',
            'prdNombre.max'=>'El campo "Nombre" debe tener 45 caractéres como máximo.',
            'prdPrecio.required'=>'Complete el campo Precio.',
            'prdPrecio.numeric'=>'Complete el campo Precio con un número.',
            'prdPrecio.min'=>'Complete el campo Precio con un número mayor a 0.',
            'idMarca.required'=>'Seleccione una marca.',
            'idMarca.exists'=>'Seleccione una marca existente.',
            'idCategoria.required'=>'Seleccione una categoría.',
            'idCategoria.exists'=>'Seleccione una categoría existente.',
            'prdDescripcion.required'=>'Complete el campo Descripción.',
            'prdDescripcion.min'=>'Complete el campo Descripción con al menos 5 caractéres',
            'prdDescripcion.max'=>'Complete el campo Descripción con 1000 caractéres como máxino.',
            'prdImagen.mimes'=>'Debe ser una imagen.',
            'prdImagen.max'=>'Debe ser una imagen de 2MB como máximo.'
        ];
    }
}
