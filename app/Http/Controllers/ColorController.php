<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function vistaTodas()
    {
        $colores = Color::all();
        return view('administrador.color.todas', compact('colores'));
    }

    public function vistaCrear()
    {
        return view('administrador.color.crear');
    }

    public function crear(Request $request)
    {
        $color = new Color();
        $color->nombre = $request->nombre;
        $color->save();

        return redirect()->route('color.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    public function vistaVer($id)
    {
        $color = Color::find($id);
        return view('administrador.color.ver', compact('color'));
    }

    public function vistaEditar($id)
    {
        $color = Color::find($id);
        return view('administrador.color.editar', compact('color'));
    }

    public function editar(Request $request, $id)
    {
        $color = Color::findOrFail($id);
        $color->nombre = $request->nombre;
        $color->save();

        return redirect()->route('color.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $color = Color::find($id);
        $color->delete();

        return redirect()->route('color.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
