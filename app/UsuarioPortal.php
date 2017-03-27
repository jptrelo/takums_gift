<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsuarioPortal extends Authenticatable
{
    use Notifiable;

    protected $table = "usuario_portal";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Obtener productos de la categoria relacionada
     */
    public function usuario_producto()
    {
        return $this->hasMany('App\UsuarioProducto');
    }
}
