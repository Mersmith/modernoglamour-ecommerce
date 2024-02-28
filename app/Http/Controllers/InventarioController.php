<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventarioRequest;
use App\Models\Inventario;
use App\Models\Variacion;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function vistaTodas()
    {
        $productosConVariaciones = Variacion::with('producto', 'talla', 'color', 'inventario')->simplePaginate(30);
        return view('administrador.inventario.todas', compact('productosConVariaciones'));
    }

    public function vistaEditar($id)
    {
        $inventario = Inventario::find($id);
        return view('administrador.inventario.editar', compact('inventario'));
    }

    public function editar(InventarioRequest $request, $id)
    {
        $inventario = Inventario::findOrFail($id);

        $inventario->stock = $request->stock;
        $inventario->save();

        return redirect()->route('inventario.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $inventario = Inventario::find($id);
        $inventario->delete();

        return redirect()->route('inventario.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
