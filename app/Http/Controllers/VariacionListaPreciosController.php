<?php

namespace App\Http\Controllers;

use App\Models\ListaPrecio;
use App\Models\Variacion;
use App\Models\VariacionListaPrecios;
use Illuminate\Http\Request;

class VariacionListaPreciosController extends Controller
{
    public function vistaCrear($id)
    {
        $listas_precio = ListaPrecio::all();
        $variacion = Variacion::find($id);
        return view('administrador.variacion-listas-precio.crear', compact('listas_precio', 'variacion'));
    }

    public function crear(Request $request, $id)
    {
        $variacion = Variacion::findOrFail($id);

        $precios = collect($request->input('precios'))->filter(function ($precio) {
            return $precio > 0;
        })->all();

        foreach ($precios as $lista_precio_id => $precio) {
            if ($precio > 0) {
                $variacion->precios()->attach($lista_precio_id, ['precio' => $precio]);
            }
        }

        return redirect()->route('variacion.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }
}
