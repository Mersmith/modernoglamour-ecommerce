<div>
    <h2>TODAS LISTAS PRECIO</h2>
    <a href="{{ route('lista.precio.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($listas_precio as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('lista.precio.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('lista.precio.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
