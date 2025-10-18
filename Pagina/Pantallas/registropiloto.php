<?php
require_once __DIR__ . '/../api/db.php';
require __DIR__ . '/../api/auth.php';
require_login();
require_admin();
include __DIR__ . '/../parcial/header.php';

$marcas = $conn->query("
    SELECT id, nombre 
    FROM marcas 
    WHERE nombre IN ('Renault', 'Torino', 'Ford', 'Chevrolet', 'Toyota') 
    ORDER BY nombre ASC
");
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registrar Piloto</title>
  <link rel="stylesheet" href="../style.css?v=18">
</head>
<body>
  <main class="contenedor">
    <h1 class="titulo">Registrar Piloto</h1>

    <form action="../api/add_piloto.php" method="POST" class="caja-form">
      <div class="grilla-form">
        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Edad</label>
        <input type="number" name="edad" min="14" max="90" required>

        <label>Número</label>
        <input type="number" name="numero" min="1" required>

        <label>Marca</label>
        <select name="marca" required>
          <option value="" disabled selected>Elegí una marca</option>
          <?php while ($m = $marcas->fetch_assoc()): ?>
            <option value="<?= (int)$m['id'] ?>"><?= htmlspecialchars($m['nombre']) ?></option>
          <?php endwhile; ?>
        </select>

        <label>Ciudad</label>
        <input type="text" name="ciudad" required>

        <label>Observaciones</label>
        <textarea name="observaciones" placeholder="Notas del piloto..."></textarea>

        <div class="acciones">
          <button type="submit" class="boton">Guardar piloto</button>
          <a href="campeonato.php" class="boton">Ver campeonato</a>
        </div>
      </div>
    </form>
  </main>
</body>
</html>
