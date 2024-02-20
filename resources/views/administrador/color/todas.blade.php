<div>
    <h2>TODAS COLORES</h2>
    <a href="{{ route('color.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($colores as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('color.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('color.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
