<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel - ALEXIS SPORT</title>
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
  <header>
    <h1>ALEXIS SPORT</h1>
    <p>Inventario de materiales y diseño de prendas</p>
    <nav>
      <a href="/">Inicio</a>
      <a href="/contacto">Contacto</a>
      @auth
        <a href="/dashboard">Panel</a>
      @endauth
      @guest
        <a href="/login">Iniciar sesión</a>
      @endguest
    </nav>
  </header>

  <main>
    <section>
      <h2>Panel privado</h2>
      <p>Hola, {{ Auth::user()->name }}. Esta página solo la ve quien inició sesión.</p>

      <form method="POST" action="/logout">
        @csrf
        <button type="submit">Cerrar sesión</button>
      </form>
    </section>
  </main>

  <footer>
    <p>Proyecto ALEXIS SPORT 2026</p>
  </footer>
</body>
</html>