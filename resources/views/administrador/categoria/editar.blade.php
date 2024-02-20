<div>
    <h2>EDITAR CATEGORIA</h2>
    <a href="{{ route('categoria.vista.todas') }}">Regresar</a>
    <a href="{{ route('categoria.vista.crear') }}">Crear</a>
    <a href="{{ route('categoria.vista.editar', $categoria->id) }}">Editar</a>
    <br>
    <form action="{{ route('categoria.editar', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ old('nombre', $categoria->nombre) }}">
        @error('nombre')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Slug:</p>
        <input type="text" name="slug" value="{{ old('slug', $categoria->slug) }}">
        @error('slug')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Descripción:</p>
        <textarea name="descripcion">{{ old('descripcion', $categoria->descripcion) }}</textarea>
        @error('descripcion')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
