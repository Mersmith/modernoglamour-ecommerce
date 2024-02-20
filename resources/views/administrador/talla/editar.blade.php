<div>
    <h2>EDITAR TALLA</h2>
    <a href="{{ route('talla.vista.todas') }}">Regresar</a>
    <a href="{{ route('talla.vista.crear') }}">Crear</a>
    <a href="{{ route('talla.vista.editar', $talla->id) }}">Editar</a>
    <br>
    <form action="{{ route('talla.editar', $talla->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ $talla->nombre }}">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
