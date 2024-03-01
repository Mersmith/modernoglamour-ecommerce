<?php

namespace App\Livewire\Administrador;

use App\Models\Color;
use App\Models\Inventario;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Subcategoria;
use App\Models\Talla;
use App\Models\Variacion;
use Livewire\Component;

class ProductoCrear extends Component
{
    public $subcategoria_id = "";
    public $marca_id = "";
    public $nombre = null;
    public $slug = null;
    public $descripcion = null;

    public $subcategorias = [], $marcas = [];

    public $tieneTalla = false;
    public $tieneColor = false;

    public $stock = 0;
    public $talla_id = "";
    public $color_id = "";

    public $tallas = [];
    public $colores = [];

    public $variaciones = [];

    public function mount()
    {
        $this->subcategorias = Subcategoria::all();
        $this->marcas = Marca::all();
    }

    public function updatedTieneTalla($value)
    {
        $this->variaciones = [];

        if ($value) {
            $this->tallas = Talla::all();
        }

        $this->resetVariationInputs();
    }

    public function updatedTieneColor($value)
    {
        $this->variaciones = [];

        if ($value) {
            $this->colores = Color::all();
        }

        $this->resetVariationInputs();
    }

    public function agregarVariacion()
    {
        if ($this->talla_id || $this->color_id) {
            $variacion = [];

            if ($this->tieneTalla) {
                $variacion['talla_id'] = $this->talla_id;
            }

            if ($this->tieneColor) {
                $variacion['color_id'] = $this->color_id;
            }

            $variacion['stock'] = $this->stock;

            if (!$this->existeVariacion($variacion)) {

                $this->variaciones[] = $variacion;

                $this->resetVariationInputs();
            }
        }
    }

    public function enviar()
    {
        $producto_nuevo = new Producto();
        $producto_nuevo->subcategoria_id  = $this->subcategoria_id;
        $producto_nuevo->marca_id  = $this->marca_id;
        $producto_nuevo->nombre = $this->nombre;
        $producto_nuevo->slug = $this->slug;
        $producto_nuevo->descripcion = $this->descripcion;
        $producto_nuevo->save();

        if (empty($this->variaciones)) {
            $variacion_nuevo = new Variacion();
            $variacion_nuevo->producto_id  = $producto_nuevo->id;
            $variacion_nuevo->save();

            $inventario_nuevo = new Inventario();
            $inventario_nuevo->variacion_id = $variacion_nuevo->id;
            $inventario_nuevo->stock = $this->stock;
            $inventario_nuevo->stock_minimo = 2;
            $inventario_nuevo->save();
        } else {
            foreach ($this->variaciones as $variacion) {
                $variacion_nuevo = new Variacion();
                $variacion_nuevo->producto_id = $producto_nuevo->id;
                $variacion_nuevo->talla_id = $variacion['talla_id'] ?? null;
                $variacion_nuevo->color_id = $variacion['color_id'] ?? null;
                $variacion_nuevo->save();

                $inventario_nuevo = new Inventario();
                $inventario_nuevo->variacion_id = $variacion_nuevo->id;
                $inventario_nuevo->stock = $variacion['stock'];
                $inventario_nuevo->stock_minimo = 2;
                $inventario_nuevo->save();
            }
        }
    }

    protected function existeVariacion($variacion)
    {
        if ($this->tieneTalla && !$this->tieneColor) {
            foreach ($this->variaciones as $v) {
                if ($v['talla_id'] == $variacion['talla_id']) {
                    return true;
                }
            }
        } elseif (!$this->tieneTalla && $this->tieneColor) {
            foreach ($this->variaciones as $v) {
                if ($v['color_id'] == $variacion['color_id']) {
                    return true;
                }
            }
        } elseif ($this->tieneTalla && $this->tieneColor) {
            foreach ($this->variaciones as $v) {
                if ($v['talla_id'] == $variacion['talla_id'] && $v['color_id'] == $variacion['color_id']) {
                    return true;
                }
            }
        }
        return false;
    }

    public function resetVariationInputs()
    {
        $this->stock = 0;
        $this->talla_id = '';
        $this->color_id = '';
    }

    public function render()
    {
        return view('livewire.administrador.producto-crear');
    }
}
