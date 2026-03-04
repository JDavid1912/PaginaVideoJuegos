<!doctype html>
<html lang="en">
    <head>
        <title>Registro</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="{{ asset('css/Register.css') }}">
    </head>

    <body>
        <header>
            <h1>Register</h1>
        </header>
        <main>
            <form action="{{route('register.store')}}" method="POST">
                @csrf
                <label for="name">Nombre del usuario</label>
                <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" >

                <label for="email">Correo electrónico</label>
                <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" >

                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Contraseña" >

                <label for="password_confirmation">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" >
            
                <button class="btn" type="submit">Registrar</button>
                @if ($errors->any())
                   <div>
                    @foreach ($errors->all() as $error)
                        <p style="color: red">{{ $error }}</p>
                    @endforeach
                    
                   </div>
                @endif
            </form>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
