<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    static $rules = [
		'descripcion_categoria' => 'required',
    ];

    protected $fillable = ['descripcion_categoria'];

    

    public function subCategoria()
    {
      return $this->hasMany('App\SubCategoria', 'sub_categoria_id', 'id');
    }

    
}
