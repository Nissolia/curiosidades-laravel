@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Curiosidad</h1>
    <form action="{{ route('curiosidades.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>
        <input type="file" name="imagen">
        <button type="submit">Guardar</button>
    </form>
</div>
@endsection
