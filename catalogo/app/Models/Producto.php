<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $primaryKey = 'idProducto';
    public $timestamps = false;
    static function checkProductoXMarca( int $idMarca )
    {
        // obj || null
        //$check = Producto::where('idMarca', $idMarca)->first();
        // int
        $check = Producto::where('idMarca', $idMarca)->count();
        return $check;
    }

    // métodos de relacion
    public function getMarca() : BelongsTo
    {
        return $this->belongsTo(Marca::class, 'idMarca');
    }

    public function getCategoria() : BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
}
