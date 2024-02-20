<div>
    <h2>VER COLOR</h2>
    <a href="{{ route('color.vista.todas') }}">Regresar</a>
    <a href="{{ route('color.vista.crear') }}">Crear</a>
    <a href="{{ route('color.vista.editar', $color->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $color->nombre }} </p>

    <br>
    <form action="{{ route('color.eliminar', $color->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
