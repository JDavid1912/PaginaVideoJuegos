<!DOCTYPE html>
<html lang="es"><head>
  <title>Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/Create.css') }}">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="{{ route('dashboard.index') }}">Dashboard</a>
    <a href="{{ route('posts.index') }}">Posts</a>
    <form action="{{ route('logout') }}" method="POST">
      @csrf <button>Cerrar sesión</button>
    </form>
  </nav>
  <main class="py-4">@yield('content')</main>
</body>
</html>
