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
Route::get('/marca/create', [ MarcaController::class, 'create' ] );
Route::post('/marca/store', [ MarcaController::class, 'store' ] );
Route::get('/marca/{id}/edit', [ MarcaController::class, 'edit' ] );
Route::put('/marca/{id}/update', [ MarcaController::class, 'update' ] );
