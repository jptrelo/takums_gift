<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table ='producto';
    protected $fillable = array('id','titulo', 'descripcion', 'valor', 'categoria_id');

    /**
     * Categoria relacionada
     */
    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }

    public function usuario_producto()
    {
        return $this->hasMany('App\UsuarioProducto');
    }
}
