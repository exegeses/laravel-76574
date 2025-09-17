<?php



Route::get('/', function () {
    //return view('welcome');
    return view('inicio');
});
Route::view('/plantilla', 'plantilla');

//Route::view('/marcas', 'marcas');
Route::view('/categorias', 'categorias');
//Route::view('/productos', 'productos');

############# CRUD de marcas
use App\Http\Controllers\MarcaController;
Route::get('/marcas', [ MarcaController::class, 'index' ] );
Route::get('/marca/create', [ MarcaController::class, 'create' ] );
Route::post('/marca/store', [ MarcaController::class, 'store' ] );
Route::get('/marca/{marca}/edit', [ MarcaController::class, 'edit' ] );
Route::put('/marca/{id}/update', [ MarcaController::class, 'update' ] );
Route::get('/marca/{id}/delete', [ MarcaController::class, 'confirm' ] );
Route::delete('/marca/{id}/delete', [ MarcaController::class, 'destroy' ] );

############# CRUD de productos
use App\Http\Controllers\ProductoController;
Route::get('/productos', [ ProductoController::class, 'index' ] );
Route::get('/producto/create', [ ProductoController::class, 'create' ] );
Route::post('/producto/store', [ ProductoController::class, 'store' ] );
Route::get('/producto/{producto}/edit', [ ProductoController::class, 'edit' ] );
Route::put('/producto/{producto}/update', [ ProductoController::class, 'update' ] );
