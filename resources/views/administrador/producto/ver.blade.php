<div>
    <h2>VER PRODUCTO</h2>
    <a href="{{ route('producto.vista.todas') }}">Regresar</a>
    <a href="{{ route('producto.vista.crear') }}">Crear</a>
    <a href="{{ route('producto.vista.editar', $producto->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $producto->nombre }} </p>
    <p>Slug: {{ $producto->slug }} </p>
    <p>Descripción: {{ $producto->descripcion }} </p>

    <br>
    <form action="{{ route('producto.eliminar', $producto->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
