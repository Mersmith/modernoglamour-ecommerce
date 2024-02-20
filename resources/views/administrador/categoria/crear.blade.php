<div>
    <h2>CREAR CATEGORIA</h2>
    <a href="{{ route('categoria.vista.todas') }}">Regresar</a>

    <form action="{{ route('categoria.crear') }}" method="POST">
        @csrf
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
