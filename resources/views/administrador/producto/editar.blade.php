<div>
    <h2>EDITAR PRODUCTO</h2>
    <a href="{{ route('producto.vista.todas') }}">Regresar</a>
    <a href="{{ route('producto.vista.crear') }}">Crear</a>
    <a href="{{ route('producto.vista.editar', $producto->id) }}">Editar</a>
    <br>
    <form action="{{ route('producto.editar', $producto->id) }}" method="POST">
        @csrf

        <p>Subcategorias:</p>
        <select name="subcategoria_id">
            <option value="" @if (old('subcategoria_id', $producto->subcategoria_id) == '') selected @endif disabled>Seleccione</option>
            @foreach ($subcategorias as $subcategoria)
                <option value="{{ $subcategoria->id }}" @if (old('subcategoria_id', $producto->subcategoria_id) == $subcategoria->id) selected @endif>
                    {{ $subcategoria->nombre }}</option>
            @endforeach
        </select>
        @error('subcategoria_id')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Marcas:</p>
        <select name="marca_id">
            <option value="" @if (old('marca_id', $producto->marca_id) == '') selected @endif disabled>Seleccione</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" @if (old('marca_id', $producto->marca_id) == $marca->id) selected @endif>
                    {{ $marca->nombre }}</option>
            @endforeach
        </select>
        @error('marca_id')
            <div>{{ $message }}</div>
        @enderror
        <br>

        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
        @error('nombre')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Slug:</p>
        <input type="text" name="slug" value="{{ old('slug', $producto->slug) }}">
        @error('slug')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Descripción:</p>
        <textarea name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
        @error('descripcion')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
