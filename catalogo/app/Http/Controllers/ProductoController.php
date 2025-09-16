<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
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
                    'idMarca'=>'required|exists:marcas,idMarca',
                    'idCategoria'=>'required|exists:categorias,idCategoria',
                    'prdDescripcion'=>'required|min:5|max:1000',
                    'prdImagen'=>'mimes:jpeg,jpg,webp,svg,gif|max:2048'
                ],
                [
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
                ]
        );
    }

    public function subirImagen( Request $request ) : string
    {
        // si no enviaron imagen  store()
        $prdImagen = 'noDisponible.svg';

        //si enviaron imagen
        if( $request->hasFile('prdImagen') )
        {
            $file = $request->file('prdImagen');
            // renombramos arthivo
            $time = time();
            $extension = $file->getClientOriginalExtension();
            // $prdImagen = $time.'.'.$extension;
            $prdImagen = "{$time}.{$extension}";
            #####  subimos el archivo
            $file->move( public_path('/imgs/productos'), $prdImagen);
        }
        return $prdImagen;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        $prdNombre = $request->prdNombre;
        //$this->validarForm( $request );
        // subir imagen
        $prdImagen = $this->subirImagen( $request );
        try {
            $producto = new Producto;
            // asignamos atributos
            $producto->prdNombre = $prdNombre;
            $producto->prdPrecio = $request->prdPrecio;
            $producto->idMarca = $request->idMarca;
            $producto->idCategoria = $request->idCategoria;
            $producto->prdDescripcion = $request->prdDescripcion;
            $producto->prdImagen = $prdImagen;
            $producto->save();
            return redirect('/productos')
                        ->with(
                            [
                                'mensaje'=>'Producto: '.$prdNombre.' agregado correctamente.',
                                'css'=>'green'
                            ]
                        );

        }catch ( Throwable $th ){
            return redirect('/productos')
                ->with(
                    [
                        'mensaje'=>'No se pudo agregar el producto: '.$prdNombre,
                        'css'=>'red'
                    ]
                );
        }
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
