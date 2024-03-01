<?php

namespace App\Http\Controllers;

use App\Models\ListaPrecio;
use Illuminate\Http\Request;

class ListaPrecioController extends Controller
{
    public function vistaTodas()
    {
        $listas_precio = ListaPrecio::all();
        return view('administrador.lista-precio.todas', compact('listas_precio'));
    }

    public function vistaCrear()
    {
        return view('administrador.lista-precio.crear');
    }

    public function crear(Request $request)
    {
        $lista_precio = new ListaPrecio();
        $lista_precio->nombre = $request->nombre;
        $lista_precio->save();

        return redirect()->route('lista.precio.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    public function vistaVer($id)
    {
        $lista_precio = ListaPrecio::find($id);
        return view('administrador.lista-precio.ver', compact('lista_precio'));
    }

    public function vistaEditar($id)
    {
        $lista_precio = ListaPrecio::find($id);
        return view('administrador.lista-precio.editar', compact('lista_precio'));
    }

    public function editar(Request $request, $id)
    {
        $lista_precio = ListaPrecio::findOrFail($id);
        $lista_precio->nombre = $request->nombre;
        $lista_precio->save();

        return redirect()->route('lista.precio.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $lista_precio = ListaPrecio::find($id);
        $lista_precio->delete();

        return redirect()->route('lista.precio.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
