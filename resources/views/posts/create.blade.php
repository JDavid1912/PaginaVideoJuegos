@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Crear Publicación</h1>
    <hr>
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div>
            <label>Titulo</label>
            <input type="text" name="title" 
            value="{{ old('title') }}" 
            maxlength="150"
             >
        </div>
        <div>
            <label>Estado</label>
            <select name="status">
                <option value="Borrador">Borrador</option>
                <option value="Publicado">Publicado</option>
            </select>
        </div>
        <button type="submit">Guardar</button>
    </form>
</div>
@endsection