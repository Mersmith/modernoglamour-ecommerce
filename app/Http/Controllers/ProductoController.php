<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Inventario;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Subcategoria;
use App\Models\Variacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function vistaTodas()
    {
        $productos = Producto::simplePaginate(10);
        return view('administrador.producto.todas', compact('productos'));
    }

    public function vistaCrear()
    {
        $marcas = Marca::all();
        $subcategorias = Subcategoria::all();
        return view('administrador.producto.crear', compact('marcas', 'subcategorias'));
    }

    public function crear(ProductoRequest $request)
    {
        $producto = new Producto();
        $producto->marca_id = $request->marca_id;
        $producto->subcategoria_id = $request->subcategoria_id;
        $producto->nombre = $request->nombre;
        $producto->slug = Str::slug($request->slug, '-');
        $producto->descripcion = $request->descripcion;
        $producto->save();

        return redirect()->route('producto.vista.todas')->with('mensajeCrud', 'Se creo correctamente.');
    }

    /*public function vistaVer($id)
    {
        $producto = Producto::with('variacions.inventario')->find($id);

        //dd($producto);
        $producto = Producto::find($id);

        if ($producto->variacion_talla && $producto->variacion_color) {
            $tipo_variacion = "talla-color";
            $variaciones = Variacion::where('producto_id', $producto->id)
                ->whereNotNull('talla_id')
                ->with('talla', 'color', 'inventario')
                ->get()
                ->groupBy('talla_id');
        } elseif ($producto->variacion_talla && !$producto->variacion_color) {
            $tipo_variacion = "talla";
            $variaciones = Variacion::where('producto_id', $producto->id)
                ->whereNotNull('talla_id')
                ->with('talla', 'inventario')
                ->get()
                ->groupBy('talla_id');
        } elseif (!$producto->variacion_talla && $producto->variacion_color) {
            $tipo_variacion = "color";
            $variaciones = Variacion::where('producto_id', $producto->id)
                ->whereNotNull('color_id')
                ->with('color', 'inventario')
                ->get()
                ->groupBy('color_id');
        } else {
            $tipo_variacion = "sin-variacion";
            $variaciones = Variacion::where('producto_id', $producto->id)
                ->with('inventario')
                ->get();
        }

        return view('administrador.producto.ver', compact('producto', 'variaciones', 'tipo_variacion'));
    }*/

    public function vistaVer($id)
    {
        $producto = Producto::with('variacions.inventario', 'variacions.talla', 'variacions.color', 'variacions.precios')->find($id);
        //dd($producto);

        if (!$producto) {
            // Manejar el caso donde el producto no se encuentra
            abort(404, 'Producto no encontrado');
        }

        if ($producto->variacion_talla && $producto->variacion_color) {
            $tipo_variacion = "talla-color";
            $variaciones = $producto->variacions->whereNotNull('talla_id')->groupBy('talla_id');
        } elseif ($producto->variacion_talla && !$producto->variacion_color) {
            $tipo_variacion = "talla";
            $variaciones = $producto->variacions->whereNotNull('talla_id')->groupBy('talla_id');
        } elseif (!$producto->variacion_talla && $producto->variacion_color) {
            $tipo_variacion = "color";
            $variaciones = $producto->variacions->whereNotNull('color_id')->groupBy('color_id');
        } else {
            $tipo_variacion = "sin-variacion";
            $variaciones = $producto->variacions;
        }

        return view('administrador.producto.ver', compact('producto', 'variaciones', 'tipo_variacion'));
    }


    public function vistaEditar($id)
    {
        $marcas = Marca::all();
        $subcategorias = Subcategoria::all();
        $producto = Producto::find($id);
        return view('administrador.producto.editar', compact('producto', 'marcas', 'subcategorias'));
    }

    public function editar(ProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->marca_id = $request->marca_id;
        $producto->subcategoria_id = $request->subcategoria_id;
        $producto->nombre = $request->nombre;
        $producto->slug = Str::slug($request->slug, '-');
        $producto->descripcion = $request->descripcion;
        $producto->save();

        return redirect()->route('producto.vista.todas')->with('mensajeCrud', 'Se edito correctamente.');
    }

    public function eliminar($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect()->route('producto.vista.todas')->with('mensajeCrud', 'Se elimino correctamente.');
    }
}
