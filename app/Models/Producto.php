<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
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
class Producto extends Model
{
    
    static $rules = [
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

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['articulo_id', 'modelo_id','codigo_barras','descripcion','precio_compra','precio_venta', 'cantidad_base', 'existencia_agregar', 'existencia_actual'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articulo()
    {
        return $this->hasOne('App\Models\Articulo', 'id', 'articulo_id');
    }
    public function modelo()
    {
        return $this->hasOne('App\Models\Modelo', 'id', 'modelo_id');
    }

    public function historicoProducto()
    {
        return $this->hasMany('App\HistoricoProducto', 'id', 'historico_id');
    }


}
