<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioProducto extends Model
{
    protected $table ='usuario_producto';
    protected $fillable = array('id', 'producto_id', 'usuario_portal_id');

    /**
     * Producto relacionado
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'producto_id');
    }

    /**
     * Usuario relacionado
     */
    public function usuario_portal()
    {
        return $this->belongsTo('App\UsuarioPortal', 'usuario_portal_id');
    }
}
