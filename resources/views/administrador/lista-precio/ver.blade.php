<div>
    <h2>VER LISTA PRECIO</h2>
    <a href="{{ route('lista.precio.vista.todas') }}">Regresar</a>
    <a href="{{ route('lista.precio.vista.crear') }}">Crear</a>
    <a href="{{ route('lista.precio.vista.editar', $lista_precio->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $lista_precio->nombre }} </p>

    <br>
    <form action="{{ route('lista.precio.eliminar', $lista_precio->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
