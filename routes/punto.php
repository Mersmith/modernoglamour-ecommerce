<?php

use App\Http\Controllers\Punto\Inicio\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', InicioController::class)->name('inicio');