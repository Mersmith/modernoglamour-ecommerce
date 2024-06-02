<?php

use App\Http\Controllers\Erp\Inicio\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', InicioController::class)->name('inicio');