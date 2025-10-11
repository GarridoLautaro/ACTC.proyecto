<?php
require __DIR__ . '/../api/auth.php';
require_login();
require_admin();

include __DIR__ . '/../parcial/header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Piloto</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<main class="contenedor">
  <section class="caja caja-form">
    <header class="cabecera">
      <h1 class="titulo rojo">Registrar Piloto</h1>
      <p style="color:#999; margin-top:6px">Completá los datos del nuevo piloto.</p>
    </header>

    <!-- Endpoint que inserta en la tabla `pilotos` -->
    <form class="grilla-form" action="../api/add_piloto.php" method="POST">
      <div class="campo">
        <label for="nombre">Nombre del piloto</label>
        <input type="text" id="nombre" name="nombre" required maxlength="80" placeholder="Ej: Juan Pérez">
      </div>

      <div class="campo">
        <label for="edad">Edad</label>
        <input type="number" id="edad" name="edad" min="0" max="120" required placeholder="Ej: 28">
      </div>

      <div class="campo">
        <label for="numero">Número de auto</label>
        <input type="number" id="numero" name="numero" min="0" max="9999" required placeholder="Ej: 17">
      </div>

      <div class="campo">
        <label for="marca">ID de marca</label>
        <input type="number" id="marca" name="marca" min="1" required placeholder="Ej: 3">
        <small style="color:#888">Es el <strong>ID</strong> de la marca (ver tabla <em>marcas</em>).</small>
      </div>

      <div class="campo">
        <label for="ciudad">Ciudad</label>
        <input type="text" id="ciudad" name="ciudad" required maxlength="56" placeholder="Ej: Balcarce, Buenos Aires">
      </div>

      <div class="campo">
        <label for="observaciones">Observaciones</label>
        <textarea id="observaciones" name="observaciones" rows="4" placeholder="Datos adicionales, historial, etc."></textarea>
      </div>

      <div class="acciones-centro">
        <button type="reset" class="boton boton-borde">Cancelar</button>
        <button type="submit" class="boton boton-primario">Guardar piloto</button>
      </div>
    </form>
  </section>
</main>

</body>
</html>
