<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria; // Usamos nuestro modelo de categoria

class CategoriaController extends Controller
{
    /**
     * Consulta 
     */
    public function index($id = null)
    {
        // Validamos el id consultado
        if ($id == null) {
            return Categoria::orderBy('id', 'asc')->get();
        }else{
            return $this->show($id);
        }
    }

    /*
    * Guardado de registro
    */
    public function store(Request $request)
    {
        $categoria = new Categoria;
        $categoria->nombre = $request->input('nombre');
        $categoria->save();
        return 'Category record successfully created with id' . $categoria->id;
    }

    /**
     * Mostrar registro
     */
    public function show($id)
    {
        return Categoria::find($id);
    }

    /**
     * Actualizar
     */
    
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->save();
        return 'Category record successfully updated with id ' . $categoria->id;
    }

    /**
     * Eliminar
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id)->delete();
        return 'Category record successfully deleted.';
    }
}
