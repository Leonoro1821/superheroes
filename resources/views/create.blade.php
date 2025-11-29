@extends('layout')

@section('content')
<h1>Registrar Superhero</h1>

<form action="{{ route('superheroes.store') }}" method="POST">
    @csrf

    <input type="text" name="real_name" placeholder="Nombre real"><br>
    <input type="text" name="superhero_name" placeholder="Nombre de superheroe"><br>
    <input type="text" name="photo_url" placeholder="URL de la foto"><br>
    <textarea name="additional_info" placeholder="Informacion adicional"></textarea><br>

    <button type="submit">Guardar</button>
</form>
@endsection
