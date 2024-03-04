<div>
    <h2>VER REQUERIMIENTO</h2>
    <a href="{{ route('requerimiento.vista.todas') }}">Regresar</a>
    <a href="{{ route('administrador.requerimiento.crear') }}">Crear</a>

    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif

    @if ($requerimiento->observacion)
        <p>Observación: {{ $requerimiento->observacion }} </p>
    @endif

    @if ($requerimiento->comentario)
        <p>Comentario: {{ $requerimiento->comentario }} </p>
    @endif

    <p>Estado: {{ $requerimiento->solicitud }} </p>


    <br>
    <form action="{{ route('requerimiento.aprobar', $requerimiento->id) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit">Aprobar Requerimiento</button>
    </form>
    <br>

    <p>Fecha: {{ $requerimiento->created_at->format('d/m/Y H:i:s') }} </p>

    <h3>DETALLE:</h3>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requerimiento->detalles as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        {{ $item->variacion->producto->nombre }}
                        @if ($item->variacion->talla)
                            <span> | Talla: {{ $item->variacion->talla->nombre }}</span>
                        @endif
                        @if ($item->variacion->color)
                            <span> | Color: {{ $item->variacion->color->nombre }}</span>
                        @endif
                    </td>
                    <td>{{ $item->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
