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
                <th></th>
            </tr>
        </thead>
           @foreach ($posts as $post)
               <tr>
                <td>{{ $post-> id }}</td>
                <td>{{ $post-> title }}</td>
                <td>{{ $post-> status }}</td>
                <td><a href="{{route('posts.create', $post->id)}}"></a>Editar</td>
                <form method="POST" action='{{route('posts.destroy', $post->id)}}'>
                @csrf
                @method('DELETE')
                <button class="btn" type="submit">Eliminar</button></td>
                </form>
            </tr>
           @endforeach
        <tbody>
        </tbody>    
    </table>
</div>
@endsection
