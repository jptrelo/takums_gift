<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioProducto;

class UsuarioProductoController extends Controller
{
     /**
     * Consulta 
     */
    public function index($id = null)
    {
        // Validamos el id consultado
        if ($id == null) {
            return UsuarioProducto::with('usuario_portal')->with('producto')->orderBy('id', 'asc')->get();
        }else{
            return $this->show($id);
        }
    }

    /*
    * Guardado de registro
    */
    public function store(Request $request)
    {
        $usuario_producto = new UsuarioProducto;
        $usuario_producto->usuario_portal_id = $request->input('usuario_portal_id');
        $usuario_producto->producto_id = $request->input('producto_id');
        $usuario_producto->save();
        return 'Product record successfully created with Id ' . $usuario_producto->id;
    }

    /**
     * Mostrar registro
     */
    public function show($id)
    {
        return UsuarioProducto::with('usuario_portal')->with('producto')->find($id);
    }

    /**
     * Actualizar
     */
    
    public function update(Request $request, $id)
    {
        $usuario_producto = UsuarioProducto::find($id);
        $usuario_producto->usuario_portal_id = $request->input('usuario_portal_id');
        $usuario_producto->producto_id = $request->input('producto_id');
        $usuario_producto->save();
        return 'Product record successfully updated with Id ' . $usuario_producto->id;
    }

    /**
     * Eliminar
     */
    public function destroy($id)
    {
        $usuario_producto = UsuarioProducto::find($id)->delete();
        return 'Product record successfully deleted.';
    }
}
