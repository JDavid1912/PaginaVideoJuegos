@extends('layouts.app')
@section('content')
    
<div class="container">
    <h1>Editar Publicación</h1>
    <hr>
    <form method="POST" action="{{route('posts.update', $post->id)}}">

@csrf
@method('PUT')

        <div>
            <label>Titulo</label>
            <input type="text" name="title" 
            value="{{ old('title', $post->title) }}" 
            maxlength="150"required>
        </div>

        <div>
            <label>slug</label>
            <input type="text" name="slug" 
            value="{{ old('slug', $post->slug) }}" 
            required>
        </div>

        <div>
            <label>Contenido</label>
            <textarea name="content" rows="6">
                {{ old('content', $post->content) }}
            </textarea>
        </div>
        <div>
            <label>Estado</label>
            <select name="status">
                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Borrador</option>
                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Publicado</option>
            </option>
            </select>
        </div>
        <button type="submit">Actualizar</button>
    </form>
</div>
@endsection