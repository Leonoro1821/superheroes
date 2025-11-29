@extends('layout')

@section('content')
<h1>Lista de Superheroes (Activos)</h1>

<a href="{{ route('superheroes.create') }}">Registrar Superhero</a>
<br><br>

{{-- Botón para ver los eliminados --}}
<a href="{{ route('superheroes.trashed') }}">Ver Superheroes Eliminados</a>

<ul>
@foreach($superheroes as $hero)
    <li>
        <a href="{{ route('superheroes.show', $hero->id) }}">
            {{ $hero->superhero_name }}
        </a>

        <a href="{{ route('superheroes.edit', $hero->id) }}">Editar</a>

        <form action="{{ route('superheroes.destroy', $hero->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </li>
@endforeach
</ul>
@endsection
