<?php

namespace App\Livewire\Administrador;

use App\Models\Requerimiento;
use App\Models\RequerimientoDetalle;
use App\Models\Variacion;
use Livewire\Component;

class RequerimientoCrear extends Component
{
    public $variaciones = [];
    public $variacion_id = "";
    public $comentario = null;
    public $carrito = [];

    public function mount()
    {
        $this->variaciones = Variacion::with('producto', 'talla', 'color')->get();
    }

    public function agregar()
    {
        if ($this->variacion_id) {
            $variacion = Variacion::findOrFail($this->variacion_id);

            if (!$this->validarRepetido($variacion)) {
                $this->carrito[] = [
                    'variacion_id' => $variacion->id,
                    'producto_id' => $variacion->producto->id,
                    'producto_nombre' => $variacion->producto->nombre,
                    'talla' => $variacion->talla ? $variacion->talla->nombre : null,
                    'color' => $variacion->color ? $variacion->color->nombre : null,
                    'cantidad' => 1,
                ];
            }
        }
    }

    public function quitar($index)
    {
        unset($this->carrito[$index]);
        $this->carrito = array_values($this->carrito);
    }

    public function enviar()
    {
        if (!empty($this->carrito)) {
            $requerimiento_nuevo = new Requerimiento();
            $requerimiento_nuevo->comentario  = $this->comentario;
            $requerimiento_nuevo->save();

            foreach ($this->carrito as $item) {
                $requerimiento_detalle_nuevo = new RequerimientoDetalle();
                $requerimiento_detalle_nuevo->requerimiento_id  = $requerimiento_nuevo->id;
                $requerimiento_detalle_nuevo->variacion_id  = $item['variacion_id'];
                $requerimiento_detalle_nuevo->cantidad  = $item['cantidad'];
                $requerimiento_detalle_nuevo->save();
            }
        }
    }

    protected function validarRepetido($variacion)
    {
        foreach ($this->carrito as $item) {
            if ($item['variacion_id'] == $variacion->id) {
                return true;
            }
        }
        return false;
    }

    public function render()
    {
        return view('livewire.administrador.requerimiento-crear');
    }
}
