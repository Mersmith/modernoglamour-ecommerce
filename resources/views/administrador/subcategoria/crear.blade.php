<div>
    <h2>CREAR SUBCATEGORIA</h2>
    <a href="{{ route('subcategoria.vista.todas') }}">Regresar</a>

    <form action="{{ route('subcategoria.crear') }}" method="POST">
        @csrf

        <p>Categorias:</p>
        <select name="categoria_id">
            <option value="" @if (old('categoria_id') == '') selected @endif disabled>Seleccione</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if (old('categoria_id') == $categoria->id) selected @endif>
                    {{ $categoria->nombre }}</option>
            @endforeach
        </select>
        @error('categoria_id')
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
