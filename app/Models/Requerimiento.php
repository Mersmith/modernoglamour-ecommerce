<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'update_at'];

    const PENDIENTE = 1;
    const OBSERVADO = 2;
    const RECHAZADO = 3;
    const APROVADO = 4;

    public function detalles()
    {
        return $this->hasMany(RequerimientoDetalle::class);
    }
}
