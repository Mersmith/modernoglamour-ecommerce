<div>
    <p>Productos:</p>
    <select wire:model="variacion_id">
        <option value="" selected disabled>Seleccione</option>
        @foreach ($variaciones as $variacion)
            <option value="{{ $variacion->id }}">
                {{ $variacion->producto->nombre }}
                @if ($variacion->talla)
                    <span> | Talla: {{ $variacion->talla->nombre }}</span>
                @endif
                @if ($variacion->color)
                    <span> | Color: {{ $variacion->color->nombre }}</span>
                @endif
            </option>
        @endforeach
    </select>

    <br>

    <button wire:click="agregar">Agregar</button>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Talla</th>
                <th>Color</th>
                <th>Cantidad</th>
                <th>Quitar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $index => $item)
                <tr>
                    <td>{{ $item['producto_nombre'] }}</td>
                    <td>{{ $item['talla'] }}</td>
                    <td>{{ $item['color'] }}</td>
                    <td>
                        <input type="number" wire:model="carrito.{{ $index }}.cantidad" min="1">
                    </td>
                    <td>
                        <button wire:click="quitar({{ $index }})">Quitar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>

    <p>Comentario:</p>
    <textarea rows="3" wire:model="comentario"></textarea>

    <br>

    <button wire:click="enviar">Enviar</button>
</div>
