<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function vistaTodas()
    {
        $productos = Producto::all();
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

    public function vistaVer($id)
    {
        $producto = Producto::find($id);
        return view('administrador.producto.ver', compact('producto'));
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
