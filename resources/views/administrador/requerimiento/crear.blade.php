<div>
    <h2>CREAR REQUERIMIENTO</h2>
    <a href="{{ route('requerimiento.vista.todas') }}">Regresar</a>

    <form action="{{ route('requerimiento.crear') }}" method="POST">
        @csrf

        <p>Productos:</p>
        <select name="variacion_id">
            <option value="" @if (old('variacion_id') == '') selected @endif disabled>Seleccione</option>
            @foreach ($productosConVariaciones as $variacion)
                <option value="{{ $variacion->id }}" @if (old('variacion_id') == $variacion->id) selected @endif>
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
        @error('variacion_id')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Comentario:</p>
        <textarea name="comentario">{{ old('comentario') }}</textarea>
        @error('comentario')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
