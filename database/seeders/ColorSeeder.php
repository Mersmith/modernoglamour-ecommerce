<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colores = ['Blanco', 'Negro', 'Azul', 'Morado', 'Marrón', 'Canela', 'Anaranjado', 'Amarillo', 'Celeste', 'Gris', 'Rosado'];

        foreach ($colores as $color) {
            Color::create([
                'nombre' => $color
            ]);
        }
    }
}
