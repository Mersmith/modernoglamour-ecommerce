<div>
    <h2>VER TALLA</h2>
    <a href="{{ route('talla.vista.todas') }}">Regresar</a>
    <a href="{{ route('talla.vista.crear') }}">Crear</a>
    <a href="{{ route('talla.vista.editar', $talla->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $talla->nombre }} </p>

    <br>
    <form action="{{ route('talla.eliminar', $talla->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
