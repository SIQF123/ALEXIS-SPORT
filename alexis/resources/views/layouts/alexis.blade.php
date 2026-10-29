<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('titulo', 'Inicio') - ALEXIS SPORT</title>
  <link rel="stylesheet" href="{{ asset('alexis.css') }}">
</head>
<body>

  <header class="cabecera">
    <h1>ALEXIS SPORT</h1>
    <p>Inventario de materiales y diseño de prendas</p>
    <nav>
      <a href="/">Inicio</a>
      <a href="/diseno">Diseñar prenda</a>
      <a href="/contacto">Contacto</a>
      @auth
        <a href="/dashboard">Panel</a>
        <form method="POST" action="/logout" class="salir">
          @csrf
          <button type="submit">Cerrar sesión</button>
        </form>
      @endauth
      @guest
        <a href="/login">Iniciar sesión</a>
      @endguest
    </nav>
  </header>

  <main>
    @yield('contenido')
  </main>

  <footer>
    <p>Proyecto ALEXIS SPORT 2026</p>
  </footer>

</body>
</html>