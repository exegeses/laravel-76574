<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    static function checkProductoXMarca( int $idMarca )
    {
        // obj || null
        //$check = Producto::where('idMarca', $idMarca)->first();
        // int
        $check = Producto::where('idMarca', $idMarca)->count();
        return $check;
    }
}
