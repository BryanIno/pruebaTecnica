@extends('layout.app')

@section('titulo','Rick y Morty')

@section('contenido')
    <form method="get" action="{{ route('personaje.index') }}">
        <label for="species">Filtrar por Especie:</label>
        <select name="species" id="species">
            <option value="">Todas</option>
            <option value="Human"{{ request('species') === 'Human' ? ' selected' : '' }}>Humano</option>
            <option value="Humanoid"{{ request('species') === 'Humanoid' ? ' selected' : '' }}>Humanoide</option>
            <!-- Agrega más opciones según las especies que puedan existir -->
        </select>

        <label for="status">Filtrar por Estado:</label>
        <select name="status" id="status">
            <option value="">Todos</option>
            <option value="Alive"{{ request('status') === 'Alive' ? ' selected' : '' }}>Vivo</option>
            <option value="Dead"{{ request('status') === 'Dead' ? ' selected' : '' }}>Muerto</option>
            <option value="unknown"{{ request('status') === 'unknown' ? ' selected' : '' }}>Desconocido</option>
        </select>

        <button type="submit">Filtrar</button>
    </form>

    @isset($data['results'])
        <div class="contenedor-tarjetas">
            @foreach ($data['results'] as $personaje)
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
