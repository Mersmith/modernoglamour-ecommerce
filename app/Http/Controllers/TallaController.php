<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    public function vistaTodas()
    {
        $tallas = Talla::all();
        return view('administrador.talla.todas', compact('tallas'));
    }

    public function vistaCrear()
    {
        return view('administrador.talla.crear');
    }

    public function crear(Request $request)
    {
        $talla = new Talla();
        $talla->nombre = $request->nombre;
        $talla->save();

        return redirect()->route('talla.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    public function vistaVer($id)
    {
        $talla = Talla::find($id);
        return view('administrador.talla.ver', compact('talla'));
    }

    public function vistaEditar($id)
    {
        $talla = Talla::find($id);
        return view('administrador.talla.editar', compact('talla'));
    }

    public function editar(Request $request, $id)
    {
        $talla = Talla::findOrFail($id);
        $talla->nombre = $request->nombre;
        $talla->save();

        return redirect()->route('talla.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $talla = Talla::find($id);
        $talla->delete();

        return redirect()->route('talla.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
