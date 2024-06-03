@extends('layouts.erp.erp')

@section('tituloPagina', 'Marcas')

@section('content')
    <div>

        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_erp_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_erp">
                <h2>Marcas</h2>
            </div>

            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_erp">
                <a href="{{ route('erp.marca.vista.crear') }}" class="contenedor_boton_crear">
                    Crear <i class="fa-solid fa-square-plus"></i></a>
            </div>
        </div>

        <div>
            @if (session('mensajeCrud'))
                <h6>{{ session('mensajeCrud') }}</h6>
            @endif
            <ul>
                @foreach ($marcas as $item)
                    <li>
                        <span>{{ $item->nombre }}</span>
                        <a href="{{ route('erp.marca.vista.ver', $item->id) }}">Ver</a>
                        <a href="{{ route('erp.marca.vista.editar', $item->id) }}">Editar</a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
