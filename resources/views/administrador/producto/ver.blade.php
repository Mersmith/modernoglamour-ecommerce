<div>
    <h2>VER PRODUCTO</h2>
    <a href="{{ route('producto.vista.todas') }}">Regresar</a>
    <a href="{{ route('producto.vista.crear') }}">Crear</a>
    <a href="{{ route('producto.vista.editar', $producto->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $producto->nombre }} </p>
    <p>Slug: {{ $producto->slug }} </p>
    <p>Descripción: {{ $producto->descripcion }} </p>


    <br>
    <form action="{{ route('producto.eliminar', $producto->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
    <br>

    <h2>VARIACIÓN: {{ $tipo_variacion }} </h2>
    @if ($tipo_variacion == 'talla-color')
        <ul>
            @foreach ($variaciones as $tallaId => $variacionesPorTalla)
                <li>
                    <p>Talla: {{ $tallaId }}</p>
                    <ul>
                        @foreach ($variacionesPorTalla as $variacion)
                            <li>
                                <p>Color: {{ $variacion->color->nombre }}</p>
                                <p>Stock: {{ $variacion->inventario->stock }}</p>
                                <h4>Lista de Precios</h4>
                                <ul>
                                    @foreach ($variacion->precios as $listaPrecio)
                                        <li>{{ $listaPrecio->nombre }}: ${{ $listaPrecio->pivot->precio }}</li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @elseif($tipo_variacion == 'talla')
        <ul>
            @foreach ($variaciones as $tallaId => $variacionesPorTalla)
                <li>
                    <p>Tallas: {{ $variacionesPorTalla->first()->talla->nombre }}</p>
                    <p>Stock: {{ $variacionesPorTalla->first()->inventario->stock }}</p>
                    <h4>Lista de Precios</h4>
                    <ul>
                        @foreach ($variacionesPorTalla as $variacion)
                            @foreach ($variacion->precios as $listaPrecio)
                                <li>{{ $listaPrecio->nombre }}: ${{ $listaPrecio->pivot->precio }}</li>
                            @endforeach
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @elseif($tipo_variacion == 'color')
        <ul>
            @foreach ($variaciones as $colorId => $variacionesPorColor)
                <li>
                    <p>Colores: {{ $variacionesPorColor->first()->color->nombre }}</p>
                    <p>Stock: {{ $variacionesPorColor->first()->inventario->stock }}</p>
                    <ul>
                        @foreach ($variacionesPorColor as $variacion)
                            @foreach ($variacion->precios as $listaPrecio)
                                <li>{{ $listaPrecio->nombre }}: ${{ $listaPrecio->pivot->precio }}</li>
                            @endforeach
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @else
        <ul>
            @foreach ($variaciones as $variacion)
                <li>
                    <p>Stock: {{ $variacion->inventario->stock }}</p>
                    <h4>Lista de Precios</h4>
                    <ul>
                        @foreach ($variacion->precios as $listaPrecio)
                            <li>{{ $listaPrecio->nombre }}: ${{ $listaPrecio->pivot->precio }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    @endif

</div>
