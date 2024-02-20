<div>
    <h2>TODAS SUBCATEGORIAS</h2>
    <a href="{{ route('subcategoria.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($subcategorias as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('subcategoria.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('subcategoria.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
