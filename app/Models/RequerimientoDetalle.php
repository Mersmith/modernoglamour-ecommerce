<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequerimientoDetalle extends Model
{
    use HasFactory;

    protected $fillable = ['requerimiento_id', 'variacion_id', 'cantidad'];

    public function requerimiento()
    {
        return $this->belongsTo(Requerimiento::class);
    }

    public function variacion()
    {
        return $this->belongsTo(Variacion::class);
    }
}
