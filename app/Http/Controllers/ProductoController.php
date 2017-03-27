<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto; // Usamos nuestro modelo de producto

class ProductoController extends Controller
{
    /**
     * Consulta 
     */
    public function index($id = null)
    {
        // Validamos el id consultado
        if ($id == null) {
            $productos = Producto::with('categoria')->orderBy('id', 'asc')->get();
            $estados = \Config::get('constants.estados');
            $productos_estados = array(
                'productos' => $productos,
                'estados' =>   $estados                
            );
            return $productos_estados;
        }else{
            return $this->show($id);
        }
    }

    /*
    * Guardado de registro
    */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->titulo = $request->input('titulo');
        $producto->descripcion = $request->input('descripcion');
        $producto->valor = $request->input('valor');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->estado = $request->input('estado');
        $producto->save();
        return 'Product record successfully created with Id ' . $producto->id;
    }

    /**
     * Mostrar registro
     */
    public function show($id)
    {
        return Producto::with('categoria')->find($id);
    }

    /**
     * Actualizar
     */
    
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->titulo = $request->input('titulo');
        $producto->descripcion = $request->input('descripcion');
        $producto->valor = $request->input('valor');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->estado = $request->input('estado');
        $producto->save();
        return 'Product record successfully updated with Id ' . $producto->id;
    }

    /**
     * Eliminar
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();
        return 'Product record successfully deleted.';
    }
}
