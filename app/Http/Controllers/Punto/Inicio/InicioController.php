<?php

namespace App\Http\Controllers\Punto\Inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke()
    {
        return view('punto.inicio.index');
    }
}
