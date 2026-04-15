@extends('layouts.app')

@section('content')
  
<div class="container">
    <h1>Gestion de Horas </h1>
    <a href="{{route('posts.create')}}">Crear publicación</a>
    <hr>
    @if(session('ok'))
        <p>{{ session('ok') }}</p>
    @endif

    <table class="tabla">
        
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Estados</th>
                <th>Slug</th>
                <th>Acciones</th>
            </tr>
        </thead>
           @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->status }}</td>
                <td>{{$post->slug}}</td>
                <td>
                    <a href="{{route('posts.edit', $post->id)}}">Editar</a>
                    <a href="{{route('posts.show', $post->id)}}">Ver</a>
                </td>
                <form method="POST" 
                        action='{{route('posts.destroy', $post->id)}}'
                        style >
                @csrf
                @method('DELETE')
                <button class="btn" type="submit">Eliminar</button>
                </td>
                </form>
            </tr>
           @endforeach    
    </table>
</div>
@endsection
