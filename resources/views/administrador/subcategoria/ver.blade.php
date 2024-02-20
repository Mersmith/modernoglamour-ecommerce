<div>
    <h2>VER SUBCATEGORIAS</h2>
    <a href="{{ route('subcategoria.vista.todas') }}">Regresar</a>
    <a href="{{ route('subcategoria.vista.crear') }}">Crear</a>
    <a href="{{ route('subcategoria.vista.editar', $subcategoria->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $subcategoria->nombre }} </p>
    <p>Slug: {{ $subcategoria->slug }} </p>
    <p>Descripción: {{ $subcategoria->descripcion }} </p>

    <br>
    <form action="{{ route('subcategoria.eliminar', $subcategoria->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
