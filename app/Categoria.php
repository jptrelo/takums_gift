<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table ='categoria';
    protected $fillable = array('id','nombre');

    /**
     * Productos de la categoria relacionada
     */
    public function producto()
    {
        return $this->hasMany('App\Producto');
    }
}
