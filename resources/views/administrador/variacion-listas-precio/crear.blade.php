<div>
    <h2>CREAR VARIACION LISTA PRECIO</h2>

    <p>Producto: {{ $variacion->producto->nombre }}</p>

    <form action="{{ route('variacion.lista.precio.crear', ['id' => $variacion->id]) }}" method="POST">
        @csrf
        <table>
            <thead>
                <tr>
                    @foreach ($listas_precio as $lista_precio)
                        <th>{{ $lista_precio->nombre }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($listas_precio as $lista_precio)
                        <td><input type="number" name="precios[{{ $lista_precio->id }}]" value="0"></td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <button type="submit">Guardar</button>
    </form>
</div>