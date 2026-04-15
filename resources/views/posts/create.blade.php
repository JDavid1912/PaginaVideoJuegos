@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Publicación</h1>
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div>
            <label>Titulo</label>
            <input type="text" name="title" 
            value="{{ old('title') }}" 
            maxlength="150" required>
        </div>

        <div>
            <label>Slug</label>
            <input type="text" name='slug'
             value="{{ old('slug') }}" required>
        </div>

       <div>
            <label>Contenido</label>
            <textarea name="content" rows="3" required>
                {{ old('content') }}
            </textarea>
        </div>

        <div>
            <label>Estado</label>
            <select name="status">
                <option value="draft">Borrador</option>
                <option value="published">Publicado</option>
            </select>
        </div>

        <button type="submit">Guardar</button>
    </form>
</div>
@endsection