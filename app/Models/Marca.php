<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 *
 * @property $id
 * @property $descripcion_marca
 * @property $created_at
 * @property $updated_at
 *
 * @property Modelo[] $modelos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Marca extends Model
{
    
    static $rules = [
		'descripcion_marca' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion_marca'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelos()
    {
        return $this->hasMany('App\Models\Modelo', 'marcas_id', 'id');
    }
    

}
