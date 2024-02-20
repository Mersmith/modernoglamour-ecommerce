<div>
    <h2>VER CATEGORIAS</h2>
    <a href="{{ route('categoria.vista.todas') }}">Regresar</a>
    <a href="{{ route('categoria.vista.crear') }}">Crear</a>
    <a href="{{ route('categoria.vista.editar', $categoria->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $categoria->nombre }} </p>
    <p>Slug: {{ $categoria->slug }} </p>
    <p>Descripción: {{ $categoria->descripcion }} </p>

    <br>
    <form action="{{ route('categoria.eliminar', $categoria->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
