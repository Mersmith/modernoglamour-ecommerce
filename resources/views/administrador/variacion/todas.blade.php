<div>
    <h2>TODAS VARIACION PRODUCTOS</h2>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($productosConVariaciones as $item)
            <li>
                <span>{{ $item->producto->nombre }}</span>
                @if ($item->talla)
                    <span>Talla: {{ $item->talla->nombre }}</span>
                @endif
                @if ($item->color)
                    <span>Color: {{ $item->color->nombre }}</span>
                @endif
                <a href="{{ route('producto.vista.ver', $item->producto->id) }}">Ver</a>
                <a href="{{ route('variacion.lista.precio.vista.crear', $item->id) }}">Editar lista precio</a>
            </li>
        @endforeach
    </ul>
    <div class="pagination">
        {{ $productosConVariaciones->links() }}
    </div>
</div>
