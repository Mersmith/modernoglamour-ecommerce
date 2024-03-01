<div>
    <h2>CREAR LISTA PRECIO</h2>
    <a href="{{ route('lista.precio.vista.todas') }}">Regresar</a>
    
    <form action="{{route('lista.precio.crear')}}" method="POST">
        @csrf
        <p>Nombre:</p>
        <input type="text" name="nombre">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
