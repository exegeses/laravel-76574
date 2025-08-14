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
    
    return view('personas');
});
