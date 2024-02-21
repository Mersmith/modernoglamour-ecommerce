<div>
    <h2>CREAR PRODUCTO</h2>
    <a href="{{ route('producto.vista.todas') }}">Regresar</a>

    <form action="{{ route('producto.crear') }}" method="POST">
        @csrf

        <p>Subcategorias:</p>
        <select name="subcategoria_id">
            <option value="" @if (old('subcategoria_id') == '') selected @endif disabled>Seleccione</option>
            @foreach ($subcategorias as $subcategoria)
                <option value="{{ $subcategoria->id }}" @if (old('subcategoria_id') == $subcategoria->id) selected @endif>
                    {{ $subcategoria->nombre }}</option>
            @endforeach
        </select>
        @error('subcategoria_id')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Marcas:</p>
        <select name="marca_id">
            <option value="" @if (old('marca_id') == '') selected @endif disabled>Seleccione</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" @if (old('marca_id') == $marca->id) selected @endif>
                    {{ $marca->nombre }}</option>
            @endforeach
        </select>
        @error('marca_id')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        @error('nombre')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Slug:</p>
        <input type="text" name="slug" value="{{ old('slug') }}">
        @error('slug')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Descripción:</p>
        <textarea name="descripcion">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
