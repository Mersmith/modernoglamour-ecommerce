<?php

namespace App\Livewire;

use App\Models\Color;
use App\Models\Talla;
use Livewire\Component;

class Counter extends Component
{
    public $tieneTalla = false;
    public $tieneColor = false;

    public $stock = 0;
    public $talla = "";
    public $color = "";

    public $tallas;
    public $colores;

    public $variaciones = [];

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
        if ($this->talla || $this->color) {
            $variacion = [];

            if ($this->tieneTalla) {
                $variacion['talla'] = $this->talla;
            }

            if ($this->tieneColor) {
                $variacion['color'] = $this->color;
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
        if ($this->tieneTalla || $this->tieneColor) {
            dd($this->variaciones);
        } else {
            dd($this->stock);
        }
    }

    protected function existeVariacion($variacion)
    {
        if ($this->tieneTalla && !$this->tieneColor) {
            foreach ($this->variaciones as $v) {
                if ($v['talla'] == $variacion['talla']) {
                    return true;
                }
            }
        } elseif (!$this->tieneTalla && $this->tieneColor) {
            foreach ($this->variaciones as $v) {
                if ($v['color'] == $variacion['color']) {
                    return true;
                }
            }
        } elseif ($this->tieneTalla && $this->tieneColor) {
            foreach ($this->variaciones as $v) {
                if ($v['talla'] == $variacion['talla'] && $v['color'] == $variacion['color']) {
                    return true;
                }
            }
        }
        return false;
    }

    public function resetVariationInputs()
    {
        $this->stock = 0;
        $this->talla = '';
        $this->color = '';
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
