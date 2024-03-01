<div>

    <p>Subcategorias:</p>
    <select wire:model="subcategoria_id">
        <option value="" selected disabled>Seleccione</option>
        @if ($subcategorias)
            @foreach ($subcategorias as $subcategoria)
                <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
            @endforeach
        @endif
    </select>

    <p>Marcas:</p>
    <select wire:model="marca_id">
        <option value="" selected disabled>Seleccione</option>
        @if ($marcas)
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
            @endforeach
        @endif
    </select>

    <p>Nombre:</p>
    <input type="text" wire:model.live="nombre">

    <p>Slug:</p>
    <input type="text" wire:model.live="slug">

    <p>Descripción:</p>
    <textarea rows="3" wire:model="descripcion"></textarea>

    <div>
        <h3>Variación</h3>
        <div>
            <p>¿Tiene talla?</p>
            <input type="checkbox" wire:model.live="tieneTalla">
        </div>

        <div>
            <p>¿Tiene color?</p>
            <input type="checkbox" wire:model.live="tieneColor">
        </div>
    </div>

    @if ($tieneTalla && $tieneColor)
        <!-- VARIACION TALLA Y COLOR -->
        <div x-show="$wire.tieneTalla">
            <label for="selectTalla">Seleccione una talla:</label>
            <select id="selectTalla" wire:model="talla_id">
                <option value="" selected disabled>Seleccione</option>
                @if ($tallas)
                    @foreach ($tallas as $talla)
                        <option value="{{ $talla->id }}">{{ $talla->nombre }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div x-show="$wire.tieneColor">
            <label for="selectColor">Seleccione un color:</label>
            <select id="selectColor" wire:model="color_id">
                <option value="" selected disabled>Seleccione</option>
                @if ($colores)
                    @foreach ($colores as $color)
                        <option value="{{ $color->id }}">{{ $color->nombre }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    @elseif($tieneTalla && !$tieneColor)
        <!-- VARIACION TALLA -->
        <div x-show="$wire.tieneTalla">
            <label for="selectTalla">Seleccione una talla:</label>
            <select id="selectTalla" wire:model="talla_id">
                <option value="" selected disabled>Seleccione</option>
                @if ($tallas)
                    @foreach ($tallas as $talla)
                        <option value="{{ $talla->id }}">{{ $talla->nombre }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    @elseif(!$tieneTalla && $tieneColor)
        <!-- VARIACION COLOR -->
        <div x-show="$wire.tieneColor">
            <label for="selectColor">Seleccione un color:</label>
            <select id="selectColor" wire:model="color_id">
                <option value="" selected disabled>Seleccione</option>
                @if ($colores)
                    @foreach ($colores as $color)
                        <option value="{{ $color->id }}">{{ $color->nombre }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    @else
        <!-- SIN VARIACIÓN -->
        <div>
            <p>Stock:</p>
            <input type="text" wire:model="stock">
        </div>
    @endif

    <div>
        @if (count($variaciones) > 0)
            <table>
                <thead>
                    <tr>
                        @if ($tieneTalla)
                            <th>Talla</th>
                        @endif

                        @if ($tieneColor)
                            <th>Color</th>
                        @endif

                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($variaciones as $index => $variacion)
                        <tr>
                            @if ($tieneTalla)
                                <td>
                                    @if ($tieneTalla)
                                        <select wire:model="variaciones.{{ $index }}.talla_id">
                                            <option value="" selected disabled>Seleccione</option>
                                            @foreach ($tallas as $t)
                                                <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>
                            @endif

                            @if ($tieneColor)
                                <td>
                                    @if ($tieneColor)
                                        <select wire:model="variaciones.{{ $index }}.color_id">
                                            <option value="" selected disabled>Seleccione</option>
                                            @foreach ($colores as $c)
                                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>
                            @endif

                            <td>
                                <input type="number" wire:model="variaciones.{{ $index }}.stock">
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @endif

    </div>

    @if ($tieneTalla || $tieneColor)
        <div>
            <button wire:click="agregarVariacion">Agregar variación</button>
        </div>
    @endif

    <br>
    <div>
        <button wire:click="enviar">Enviar</button>
    </div>
</div>
