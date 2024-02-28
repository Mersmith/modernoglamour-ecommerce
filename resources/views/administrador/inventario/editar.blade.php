<div>
    <h2>EDITAR PRODUCTO</h2>
    <a href="{{ route('inventario.vista.todas') }}">Regresar</a>
    <br>
    <form action="{{ route('inventario.eliminar', $inventario->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    <br>
    <br>
    <p>Nombre: {{ $inventario->variacion->producto->nombre }} </p>
    <p>Slug: {{ $inventario->variacion->producto->slug }} </p>
    <p>Descripción: {{ $inventario->variacion->producto->descripcion }} </p>

    @if ($inventario->variacion->talla)
        <span>Talla: {{ $inventario->variacion->talla->nombre }}</span>
    @else
    @endif

    @if ($inventario->variacion->color)
        <span>Color: {{ $inventario->variacion->color->nombre }}</span>
    @else
    @endif

    <form action="{{ route('inventario.editar', $inventario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>Stock:</p>
        <input type="number" name="stock" value="{{ old('stock', $inventario->stock) }}">
        @error('stock')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Enviar</button>
    </form>
</div>
