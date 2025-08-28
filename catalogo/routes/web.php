<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return view('inicio');
});
Route::view('/plantilla', 'plantilla');

//Route::view('/marcas', 'marcas');
Route::view('/categorias', 'categorias');
Route::view('/productos', 'productos');

use App\Http\Controllers\MarcaController;
Route::get('/marcas', [ MarcaController::class, 'index' ] );
