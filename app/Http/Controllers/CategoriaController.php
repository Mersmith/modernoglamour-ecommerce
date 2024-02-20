<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    public function vistaTodas()
    {
        $categorias = Categoria::all();
        return view('administrador.categoria.todas', compact('categorias'));
    }

    public function vistaCrear()
    {
        return view('administrador.categoria.crear');
    }

    public function crear(CategoriaRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->slug = Str::slug($request->slug, '-');
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categoria.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    public function vistaVer($id)
    {
        $categoria = Categoria::find($id);
        return view('administrador.categoria.ver', compact('categoria'));
    }

    public function vistaEditar($id)
    {
        $categoria = Categoria::find($id);
        return view('administrador.categoria.editar', compact('categoria'));
    }

    public function editar(CategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->nombre = $request->nombre;
        $categoria->slug = Str::slug($request->slug, '-');
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categoria.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->route('categoria.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
