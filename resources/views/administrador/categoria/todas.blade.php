<div>
    <h2>TODAS CATEGORIAS</h2>
    <a href="{{ route('categoria.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($categorias as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('categoria.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('categoria.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
