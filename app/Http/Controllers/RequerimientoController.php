<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Requerimiento;
use App\Models\RequerimientoDetalle;
use App\Models\Variacion;
use Illuminate\Http\Request;

class RequerimientoController extends Controller
{
    public function vistaTodas()
    {
        $requerimientos = Requerimiento::latest()->simplePaginate(10);
        return view('administrador.requerimiento.todas', compact('requerimientos'));
    }

    public function vistaCrear()
    {
        $productosConVariaciones = Variacion::with('producto', 'talla', 'color')->get();

        return view('administrador.requerimiento.crear', compact('productosConVariaciones'));
    }

    public function vistaVer($id)
    {
        $requerimiento = Requerimiento::find($id);

        return view('administrador.requerimiento.ver', compact('requerimiento'));
    }

    public function aprobar($id)
    {
        $requerimiento = Requerimiento::findOrFail($id);
        if ($requerimiento->solicitud == Requerimiento::PENDIENTE) {
            $requerimiento->solicitud = Requerimiento::APROVADO;
            $requerimiento->save();

            $detallesAprobados = RequerimientoDetalle::where('requerimiento_id', $id)->get();

            foreach ($detallesAprobados as $detalle) {
                $inventario = Inventario::where('variacion_id', $detalle->variacion_id)->first();

                $inventario->stock = $inventario->stock + $detalle->cantidad;
                $inventario->save();
            }
        }

        return redirect()->route('requerimiento.vista.ver', $requerimiento->id)->with('mensajeCrud', 'Se edito correctamente.');
    }
}
