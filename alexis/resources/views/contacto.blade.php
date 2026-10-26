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
    </nav>
  </header>

  <main>
    <section>
      <h2>Contacto</h2>
      <p>Escríbenos y te responderemos pronto.</p>
      <form>
        <fieldset>
          <legend>Escríbenos</legend>
          <p><label>Nombre:<br>
            <input type="text" name="nombre"></label></p>
          <p><label>Correo electrónico:<br>
            <input type="email" name="correo"></label></p>
          <p><label>Mensaje:<br>
            <textarea name="mensaje" rows="4" cols="40"></textarea></label></p>
        </fieldset>
      </form>
    </section>
  </main>

  <footer>
    <p>Proyecto ALEXIS SPORT 2026</p>
  </footer>
</body>
</html>