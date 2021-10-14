<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modelo
 *
 * @property $id
 * @property $marca_id
 * @property $descripcion_modelo
 * @property $created_at
 * @property $updated_at
 *
 * @property Marca $marca
 * @property Producto[] $productos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Modelo extends Model
{
    
    static $rules = [
		'marca_id' => 'required',
		'descripcion_modelo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['marca_id','descripcion_modelo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'marca_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productos()
    {
        return $this->hasMany('App\Models\Producto', 'modelo_id', 'id');
    }
    

}
