<div>
    <h2>TODAS MARCAS</h2>
    <a href="{{ route('marca.vista.crear') }}">Crear</a>
    <br>
    <ul>
        @foreach ($marcas as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('marca.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('marca.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
