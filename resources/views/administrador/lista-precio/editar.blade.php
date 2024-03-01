<div>
    <h2>EDITAR LISTA PRECIO</h2>
    <a href="{{ route('lista.precio.vista.todas') }}">Regresar</a>
    <a href="{{ route('lista.precio.vista.crear') }}">Crear</a>
    <a href="{{ route('lista.precio.vista.editar', $lista_precio->id) }}">Editar</a>
    <br>
    <form action="{{ route('lista.precio.editar', $lista_precio->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ $lista_precio->nombre }}">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
