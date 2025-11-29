@extends('layout')

@section('content')
<h1>Editar Superhero</h1>

<form action="{{ route('superheroes.update', $superhero->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="real_name" value="{{ $superhero->real_name }}"><br>
    <input type="text" name="superhero_name" value="{{ $superhero->superhero_name }}"><br>
    <input type="text" name="photo_url" value="{{ $superhero->photo_url }}"><br>
    <textarea name="additional_info">{{ $superhero->additional_info }}</textarea><br>

    <button type="submit">Actualizar</button>
</form>
@endsection
