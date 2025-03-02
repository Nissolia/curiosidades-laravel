@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Curiosidad</h1>
    <form action="{{ route('curiosidades.update', $curiosidad->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="titulo" value="{{ $curiosidad->titulo }}" required>
        <textarea name="descripcion" required>{{ $curiosidad->descripcion }}</textarea>
        <input type="file" name="imagen">
        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection
