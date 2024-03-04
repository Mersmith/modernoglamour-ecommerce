<div>
    <h2>TODAS REQUERIMIENTOS</h2>
    <a href="{{ route('administrador.requerimiento.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($requerimientos as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <span>Fecha de creación: {{ $item->created_at->format('d/m/Y H:i:s') }}</span>
                <a href="{{ route('requerimiento.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('requerimiento.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
    <div class="pagination">
        {{ $requerimientos->links() }}
    </div>
</div>
