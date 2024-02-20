<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoriaRequest;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoriaController extends Controller
{
    public function vistaTodas()
    {
        $subcategorias = Subcategoria::all();
        return view('administrador.subcategoria.todas', compact('subcategorias'));
    }

    public function vistaCrear()
    {
        $categorias = Categoria::all();
        return view('administrador.subcategoria.crear', compact('categorias'));
    }

    public function crear(SubcategoriaRequest $request)
    {
        $subcategoria = new Subcategoria();
        $subcategoria->categoria_id = $request->categoria_id;
        $subcategoria->nombre = $request->nombre;
        $subcategoria->slug = Str::slug($request->slug, '-');
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->save();

        return redirect()->route('subcategoria.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    public function vistaVer($id)
    {
        $subcategoria = Subcategoria::find($id);
        return view('administrador.subcategoria.ver', compact('subcategoria'));
    }

    public function vistaEditar($id)
    {
        $categorias = Categoria::all();
        $subcategoria = Subcategoria::find($id);
        return view('administrador.subcategoria.editar', compact('subcategoria', 'categorias'));
    }

    public function editar(SubcategoriaRequest $request, $id)
    {
        $subcategoria = Subcategoria::findOrFail($id);

        $subcategoria->nombre = $request->nombre;
        $subcategoria->slug = Str::slug($request->slug, '-');
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->save();

        return redirect()->route('subcategoria.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $subcategoria = Subcategoria::find($id);
        $subcategoria->delete();

        return redirect()->route('subcategoria.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
