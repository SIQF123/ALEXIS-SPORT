<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mensaje recibido</title>
</head>
<body>
  <h1>ALEXIS SPORT</h1>
  <h2>¡Mensaje recibido!</h2>
  <?php
  echo "<p><strong>Nombre:</strong> " . htmlspecialchars($_POST["nombre"]) . "</p>";
  echo "<p><strong>Correo:</strong> " . htmlspecialchars($_POST["correo"]) . "</p>";
  echo "<p><strong>Mensaje:</strong> " . htmlspecialchars($_POST["mensaje"]) . "</p>";
  ?>
  <p><a href="index.html">Volver</a></p>
</body>
</html>
