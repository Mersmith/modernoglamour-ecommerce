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
        $variacion = Variacion::find($id);
        $listas_precio = ListaPrecio::all();
        $preciosVariacion = $variacion->precios->pluck('pivot.precio', 'id')->toArray();

        return view('administrador.variacion-listas-precio.crear', compact('listas_precio', 'variacion', 'preciosVariacion'));
    }

    public function crear(Request $request, $id)
    {
        $variacion = Variacion::findOrFail($id);

        $precios = collect($request->input('precios'))->filter(function ($precio) {
            return $precio !== null;
        });

        $preciosActuales = $variacion->precios->pluck('pivot.precio', 'id')->toArray();

        foreach ($precios as $lista_precio_id => $precio) {
            if ($precio >= 1) {
                if (array_key_exists($lista_precio_id, $preciosActuales)) {
                    $variacion->precios()->syncWithoutDetaching([$lista_precio_id => ['precio' => $precio]]);
                } else {
                    $variacion->precios()->attach($lista_precio_id, ['precio' => $precio]);
                }
            } else {
                $variacion->precios()->detach($lista_precio_id);
            }
        }

        return redirect()->route('variacion.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }
}
