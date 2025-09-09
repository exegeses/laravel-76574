<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        // obtenemos listado de marcas
        // $marcas = Marca::all();
        // $marcas = Marca::all()->sortByDesc('idMarca');
        // $marcas = Marca::orderBy('idMarca', 'desc')->get();
        $marcas = Marca::orderByDesc('idMarca')->paginate(6);
        return view('marcas', [ 'marcas' => $marcas ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('marca-create');
    }

    private function validar(Request $request) : void
    {
        $request->validate(
            // [ 'campo' => 'regla1|regla2' ],
            // [ 'campo.regla1' => 'mensaje regla1' ]
            [
                'mkNombre' => 'required|unique:marcas,mkNombre|min:2|max:45'
            ],
            [
                'mkNombre.required'=>'El campo "Nombre de la marca" es obligatorio',
                'mkNombre.unique'=>'Ya existe una marca con ese nombre',
                'mkNombre.min'=>'El campo "Nombre de la marca" debe tener al menos 2 caractéres',
                'mkNombre.max'=>'El campo "Nombre de la marca" debe tener 45 caractéres como máximo'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $mkNombre = $request->mkNombre;
        //validación
        $this->validar($request);
        try {
            $marca = new Marca; //instanciamos
            $marca->mkNombre = $mkNombre; // asignamos atributos
            $marca->save(); // almacenamos datos en la tabla

            return redirect('/marcas')
                        ->with(
                            [
                                'mensaje'=>'Marca: '.$mkNombre.' registrada correctamente',
                                'css'=>'green'
                            ]
                        );

        }catch ( \Throwable $th){
            return redirect('/marcas')
                    ->with(
                        [
                            'mensaje'=>'No se pudo registrar la marca: '.$mkNombre,
                            'css'=>'red'
                        ]
                    );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // obtenemos los datos de una marca por su id
        $marca = Marca::find($id);
        return view('marca-edit', [ 'marca' => $marca ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $idMarca = $id;
        //$idMarca = $request->idMarca // campo hidden
        $mkNombre = $request->mkNombre;
        // valadición
        $this->validar($request);
        try {
            $marca = Marca::find($idMarca); // obtenemos la marca por su id
            $marca->mkNombre = $mkNombre; // asignamos atributos
            $marca->save(); // almacenamos en tabla marcas
            return redirect('/marcas')
                    ->with(
                        [
                            'mensaje'=>'Marca: '.$mkNombre.' actualizada correctamente',
                            'css'=>'green'
                        ]
                    );
        }
        catch ( \Throwable $th){
            return redirect('/marcas')
                    ->with(
                        [
                            'mensaje'=>'No se pudo actualizar la marca: '.$mkNombre,
                            'css'=>'red'
                        ]
                    );
        }
    }

    private function checkProdXMarca( int $idMarca )
    {
        // obj || null
        /* $check = DB::table('productos')
                    ->where('idMarca', $idMarca)->first();*/
        // int
        $check = DB::table('productos')
                        ->where('idMarca', $idMarca)->count();
        return $check;
    }
    public function confirm( string $id )
    {
        // dd( $this->checkProdXMarca($id) );
        dd(Producto::checkProductoXMarca($id));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
