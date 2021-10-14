<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $producto_id
 * @property $articulo_id
 * @property $modelo_id
 * @property $codigo_barras
 * @property $descripcion
 * @property $precio_compra
 * @property $precio_venta
 * @property $cantidad_base
 * @property $existencia_agregar
 * @property $existencia_actual
 * @property $created_at
 * @property $updated_at
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class HistoricoProducto extends Model
{
    //
    static $rules = [
		'producto_id' => 'required',
		'articulo_id' => 'required',
        'modelo_id' => 'required',
		'codigo_barras' => 'required',
		'descripcion' => 'required',
		'precio_compra' => 'required',
		'precio_venta' => 'required',
        'cantidad_base' => 'required',
        'existencia_agregar' => 'required',
        'existencia_actual' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'id', 'producto_id');
    }

}
