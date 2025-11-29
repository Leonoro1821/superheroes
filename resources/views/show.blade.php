@extends('layout')

@section('content')
<h1>{{ $superhero->superhero_name }}</h1>

<p><strong>Nombre real:</strong> {{ $superhero->real_name }}</p>
<img src="{{ $superhero->photo_url }}" width="200">
<p><strong>Info adicional:</strong> {{ $superhero->additional_info }}</p>

<a href="{{ route('superheroes.index') }}">Volver</a>
@endsection
