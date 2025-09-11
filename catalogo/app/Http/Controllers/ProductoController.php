<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::orderByDesc('idProducto')
                                ->with(['getMarca', 'getCategoria'])
                                ->paginate(6);
        return view('productos',
                        [ 'productos' => $productos ]
                    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('producto-create',
                        [
                            'marcas' => $marcas,
                            'categorias' => $categorias
                        ]
                    );
    }

    private function validarForm( Request $request ) : void
    {
        $request->validate(
                [
                    'prdNombre'=>'required|unique:productos,prdNombre|min:2|max:45',
                    'prdPrecio'=>'required|numeric|min:0',
                ],
                [
                    'prdNombre.required' => 'El campo "Nombre del producto" es obligatorio.',
                    'prdNombre.unique' => 'El campo "Nombre del producto" ya existe.',
                    'prdNombre.min'=>'El campo "Nombre del producto" debe tener como mínimo 2 caractéres.',
                    'prdNombre.max'=>'El campo "Nombre" debe tener 45 caractéres como máximo.',
                    'prdPrecio.required'=>'Complete el campo Precio.',
                    'prdPrecio.numeric'=>'Complete el campo Precio con un número.',
                    'prdPrecio.min'=>'Complete el campo Precio con un número mayor a 0.',
                ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prdNombre = $request->prdNombre;
        $this->validarForm( $request );
        return 'pasó validación';
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
