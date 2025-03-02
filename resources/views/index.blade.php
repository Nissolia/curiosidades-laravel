@extends('layouts.app')

@section('content')
    <h1>Curiosidades de Obras Artísticas</h1>
    <a href="{{ route('curiosidades.create') }}">Agregar Nueva Curiosidad</a>
    @foreach($curiosidades as $curiosidad)
        <div>
            <h2>{{ $curiosidad->titulo }}</h2>
            <p>{{ $curiosidad->descripcion }}</p>
            @if($curiosidad->imagen)
                <img src="{{ asset($curiosidad->imagen) }}" alt="Imagen">
            @endif
            <a href="{{ route('curiosidades.show', $curiosidad) }}">Ver</a>
            <a href="{{ route('curiosidades.edit', $curiosidad) }}">Editar</a>
            <form action="{{ route('curiosidades.destroy', $curiosidad) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </div>
    @endforeach
@endsection
