<div>
    <h2>CREAR COLOR</h2>
    <a href="{{ route('color.vista.todas') }}">Regresar</a>
    
    <form action="{{route('color.crear')}}" method="POST">
        @csrf
        <p>Nombre:</p>
        <input type="text" name="nombre">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
