<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    const ACTIVADO = 1;
    const DESACTIVADO = 2;

    public function talla()
    {
        return $this->belongsTo(Talla::class, 'talla_id');
    }

    public function variacions()
    {
        return $this->hasMany(Variacion::class, 'talla_id');
    }
}
