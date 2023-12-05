@extends('layout.app')

@section('titulo', 'Detalles del Personaje')

@section('contenido')
    <div class="detalle-tarjeta">
        <h2>Detalles del Personaje</h2>

        @isset($personaje)
            <img src="{{ $personaje['image'] }}" alt="{{ $personaje['name'] }}">
            <p>Nombre: {{ $personaje['name'] }}</p>
            <p>Estado: {{ $personaje['status'] }}</p>
            <p>Especie: {{ $personaje['species'] }}</p>
            <p>Tipo: {{ $personaje['type'] }}</p>
            <p>Género: {{ $personaje['gender'] }}</p>
            <p>Origen: {{ $personaje['origin']['name'] ?? 'Desconocido' }}</p>
            <p>Ubicación: {{ $personaje['location']['name'] ?? 'Desconocido' }}</p>
            <a href="{{ route('personaje.index') }}" class="boton-regreso">Volver</a>
        @else
            <p>No se encontraron detalles para este personaje.</p>
        @endisset
    </div>
@endsection

