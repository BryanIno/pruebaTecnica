@extends('layout.app')

@section('titulo','Rick y Morty')

@section('contenido')

    @isset($personajes )
        <div class="contenedor-tarjetas">
            @foreach ($personajes  as $personaje)
                <div class="tarjeta">
                    <h4>{{ $personaje['name'] }}</h4>
                    <img src="{{ $personaje['image'] }}" alt="{{ $personaje['name'] }}">
                    <a href="{{ route('personaje.show', ['id' => $personaje['id']]) }}">Ver Detalles</a>
                </div>
            @endforeach
        </div>
    @else
        <p>No se encontraron personajes.</p>
    @endisset
@endsection
