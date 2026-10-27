<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar sesión - ALEXIS SPORT</title>
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
      <h2>Iniciar sesión</h2>

      <form method="POST" action="/login">
        @csrf
        <fieldset>
          <legend>Acceso al panel</legend>

          <p><label>Correo electrónico:<br>
            <input type="email" name="email" value="{{ old('email') }}"></label>
            @error('email') <br><span class="error">{{ $message }}</span> @enderror</p>

          <p><label>Contraseña:<br>
            <input type="password" name="password"></label>
            @error('password') <br><span class="error">{{ $message }}</span> @enderror</p>

          <p><button type="submit">Entrar</button></p>
        </fieldset>
      </form>
    </section>
  </main>

  <footer>
    <p>Proyecto ALEXIS SPORT 2026</p>
  </footer>
</body>
</html>