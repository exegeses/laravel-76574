<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::método('/peticion', acción);
Route::get('/saludo', function ()
{
    return "Hola Mundo desde Laravel";
});
##
Route::view('/inicio', 'inicio');
Route::view('/plantilla', 'plantilla');

Route::get('/datos', function ()
{
    $numero = 10+5;
    $empresas = [
        "Mercado Libre",
        "Frávega",
        "Coto Digital",
        "DIA Online",
        "Cuponstar",
        "Groupon Argentina",
        "LetsBonus",
        "Pez Urbano",
        "Descuentocity",
        "Shopear"
    ];
    // retornamos una vista pasándole datos
    return view('datos',
        [
            'numero' => $numero,
            'empresas' => $empresas,
        ]
    );
});
Route::view('/form', 'form');
Route::post('/proceso', function (){
    // capturamos dato enviado por el Form
    //$nombre = $_POST['nombre'];
    //$nombre = request()->input('nombre');
    //$nombre = request()->post('nombre');
    //$nombre = request()->nombre;
    $nombre = request('nombre');
    return view('proceso', [ 'nombre' => $nombre ]);
});

Route::get('/personas', function ()
{
    // obtenemos datos de la tabla personas
    $personas = DB::select('select *
                                    from personas
                                    order by id desc');
    return view('personas',
                [ 'personas' => $personas ]
            );
});
Route::get('/persona/create', function ()
{
    return view('persona-create');
});
Route::post('/persona/store', function ()
{
    // capturamos datos enviados por el form
    $nombre = request('nombre');
    $apellido = request('apellido');
    $dni = request('dni');
    $nacimiento = request('nacimiento');
    // insertamos datos en tabla personas
    try {
        /* DB::insert('insert into personas
                            (nombre, apellido, dni, nacimiento)
                        VALUES
                            ( :nombre, :apellido, :dni, :nacimiento )',
                            [ $nombre, $apellido, $dni, $nacimiento ]
                    ); */
        DB::table('personas')
                ->insert([
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'dni' => $dni,
                    'nacimiento' => $nacimiento,
                    'created_at' => now(),
                ]);
        // redireccion
        return redirect('/personas')
                    ->with([
                        'mensaje'=>'Persona: '.$nombre.' '.$apellido.' registrada correctamente',
                        'color'=>'success'
                    ]);

    }catch (Throwable $th){
        return redirect('/personas')
                    ->with([
                        'mensaje'=>'No se pudo registyrar la persona: '.$nombre.' '.$apellido,
                        'color'=>'danger'
                    ]);
    }

});
Route::get('/persona/{id}/edit', function ($id)
{
    // obtenemos los datos de una persona filtrada por su ID
    // $persona = DB::select('select * from personas where id = :id', [$id]);
    // $persona = DB::table('personas')->where('id', $id)->first();
    $persona = DB::table('personas')->find($id);
    return view('persona-edit', ['persona' => $persona]);
});
Route::put('/persona/{id}/update', function ($id)
{
    $nombre = request('nombre');
    $apellido = request('apellido');
    $dni = request('dni');
    $nacimiento = request('nacimiento');
    try {
        /* raw SQL */
        /*DB::update('UPDATE personas
                    SET nombre = :nombre,
                        apellido = :apellido,
                        dni = :dni,
                        nacimiento = :nacimiento
                        WHERE id = :id',
            [$nombre, $apellido, $dni, $nacimiento, $id]
        );*/
        DB::table('personas')
            ->where('id', $id)
            ->update([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'dni' => $dni,
                'nacimiento' => $nacimiento,
                'updated_at' => now()
            ]);
        // redireccion
        return redirect('/personas')
            ->with([
                'mensaje'=>'Persona: '.$nombre.' '.$apellido.' modificada correctamente',
                'color'=>'success'
            ]);

    }catch (Throwable $th){
        return redirect('/personas')
            ->with([
                'mensaje'=>'No se pudo modificar la persona: '.$nombre.' '.$apellido,
                'color'=>'danger'
            ]);
    }
});
