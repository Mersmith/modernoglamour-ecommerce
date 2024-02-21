<div>
    <h2>TODAS PRODUCTOS</h2>
    <a href="{{ route('producto.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($productos as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('producto.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('producto.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
    <div class="pagination">
        {{ $productos->links() }}
    </div>
</div>
