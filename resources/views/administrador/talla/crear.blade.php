<div>
    <h2>CREAR TALLA</h2>
    <a href="{{ route('talla.vista.todas') }}">Regresar</a>
    
    <form action="{{route('talla.crear')}}" method="POST">
        @csrf
        <p>Nombre:</p>
        <input type="text" name="nombre">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
