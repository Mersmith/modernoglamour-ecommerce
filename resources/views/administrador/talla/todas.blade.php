<div>
    <h2>TODAS TALLAS</h2>
    <a href="{{ route('talla.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($tallas as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('talla.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('talla.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
