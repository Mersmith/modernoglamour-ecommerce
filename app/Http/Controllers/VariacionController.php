<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Talla;
use App\Models\Variacion;
use Illuminate\Http\Request;

class VariacionController extends Controller
{
    public function vistaTodas()
    {
        $productosConVariaciones = Variacion::with('producto', 'talla', 'color')->simplePaginate(30);
        return view('administrador.variacion.todas', compact('productosConVariaciones'));
    }
}
