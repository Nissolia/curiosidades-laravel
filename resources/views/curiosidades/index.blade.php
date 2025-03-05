@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Curiosidades de Obras Artísticas</h1>
    <a href="{{ route('curiosidades.create') }}" class="btn btn-primary">Agregar Curiosidad</a>
    <ul>
        @foreach ($curiosidades as $curiosidad)
            <li>
                <a href="{{ route('curiosidades.show', $curiosidad->id) }}">{{ $curiosidad->titulo }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
