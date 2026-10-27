<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contacto - ALEXIS SPORT</title>
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
      <h2>Contacto</h2>
      <p>Escríbenos y te responderemos pronto.</p>

      @if (session('ok'))
        <p class="exito">{{ session('ok') }}</p>
      @endif

      <form method="POST" action="/contacto">
        @csrf
        <fieldset>
          <legend>Escríbenos</legend>

          <p><label>Nombre:<br>
            <input type="text" name="nombre" value="{{ old('nombre') }}"></label>
            @error('nombre') <br><span class="error">{{ $message }}</span> @enderror</p>

          <p><label>Correo electrónico:<br>
            <input type="email" name="correo" value="{{ old('correo') }}"></label>
            @error('correo') <br><span class="error">{{ $message }}</span> @enderror</p>

          <p><label>Mensaje:<br>
            <textarea name="mensaje" rows="4" cols="40">{{ old('mensaje') }}</textarea></label>
            @error('mensaje') <br><span class="error">{{ $message }}</span> @enderror</p>

          <p><button type="submit">Enviar</button></p>
        </fieldset>
      </form>
    </section>
  </main>

  <footer>
    <p>Proyecto ALEXIS SPORT 2026</p>
  </footer>
</body>
</html>