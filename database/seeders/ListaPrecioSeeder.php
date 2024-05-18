<?php

namespace Database\Seeders;

use App\Models\ListaPrecio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListaPrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colores = ['Minorista', 'Etiqueta', 'Mayorista'];

        foreach ($colores as $color) {
            ListaPrecio::create([
                'nombre' => $color
            ]);
        }
    }
}
