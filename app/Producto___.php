<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ["sub_categoria_id", "codigo_barras", "descripcion", "precio_compra", "precio_venta", "existencia",
    ];

    public function subCatgoria()
    {
        return $this->hasMany('App\SubCategoria', 'sub_categoria_id', 'id');
    }

}
