<div>
    <h2>EDITAR COLOR</h2>
    <a href="{{ route('color.vista.todas') }}">Regresar</a>
    <a href="{{ route('color.vista.crear') }}">Crear</a>
    <a href="{{ route('color.vista.editar', $color->id) }}">Editar</a>
    <br>
    <form action="{{ route('color.editar', $color->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ $color->nombre }}">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
