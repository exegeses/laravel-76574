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



