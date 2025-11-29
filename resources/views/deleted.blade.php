@extends('layouts.app')

@section('content')
<h1>Superheroes Eliminados</h1>

<table>
    <tr>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Poder</th>
        <th>Acciones</th>
    </tr>

    @foreach ($heroes as $hero)
        <tr>
            <td><img src="{{ asset('storage/' . $hero->photo) }}" width="100"></td>
            <td>{{ $hero->name }}</td>
            <td>{{ $hero->superpower }}</td>
            <td>
                <a href="{{ route('superheroes.restore', $hero->id) }}">Restaurar</a>
            </td>
        </tr>
    @endforeach
</table>
@endsection
