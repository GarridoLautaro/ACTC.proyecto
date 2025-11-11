<?php
require __DIR__ . '/../api/auth.php';
require_login();
require_admin();

// Fallback por si no viene $marcas desde otro include:
if (!isset($marcas)) {
  // Si tenés ya este query en otro lado, podés borrar este bloque.
  @require __DIR__ . '/../api/db.php';
  if (isset($conn)) {
    $marcas = $conn->query("SELECT id, nombre FROM marcas ORDER BY nombre ASC");
  } else {
    // Evita undefined var si no hay DB
    $marcas = new class {
      function fetch_assoc(){ return null; }
    };
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrar piloto — ACTC</title>
  <link rel="stylesheet" href="../style.css?v=4" />
</head>
<body>

  <?php include __DIR__ . '/../parcial/header.php'; ?>

  <main class="contenedor">
    <h1 class="titulo rojo">Registrar piloto</h1>

    <form action="../api/add_piloto.php" method="post" class="caja-form">
      <div class="grilla-form">
        <div class="campo">
          <label>Nombre del piloto</label>
          <input type="text" name="nombre" placeholder="Apellido, Nombre" required>
        </div>

        <div class="campo">
          <label>Edad</label>
          <input type="number" name="edad" min="15" max="90" required>
        </div>

        <div class="campo">
          <label>Número</label>
          <input type="number" name="numero" min="1" max="999" required>
        </div>

        <div class="campo">
          <label>Marca</label>
          <select name="marca" required>
            <?php while($m = $marcas->fetch_assoc()): ?>
              <option value="<?= (int)$m['id'] ?>"><?= htmlspecialchars($m['nombre']) ?></option>
            <?php endwhile; ?>
          </select>
        </div>

        <div class="campo">
          <label>Ciudad</label>
          <input type="text" name="ciudad" required>
        </div>

        <div class="campo">
          <label>Observaciones</label>
          <textarea name="observaciones" placeholder="Notas del piloto..."></textarea>
        </div>

        <div class="acciones">
          <button type="submit" class="boton">Guardar piloto</button>
          <a href="campeonato.php" class="boton">Ver campeonato</a>
        </div>
      </div>
    </form>
  </main>

  <footer class="pie">
    <div class="pie-contenedor">
      <div class="pie-logo">
        <img src="./Recursos/marcas/logoactc.png" alt="ACTC">
      </div>

      <div class="pie-links">
        <h3>TC</h3>
        <ul>
          <li><a href="./inicio.php">Inicio</a></li>
          <li><a href="./calendario.php">Calendario</a></li>
          <li><a href="./campeonato.php">Resultados</a></li>
          <li><a href="./registro.php">Registro</a></li>
        </ul>
      </div>

      <div class="pie-redes">
        <h3>Seguinos</h3>
        <div class="redes-iconos">
          <a href="https://www.instagram.com/actcargentina"><img src="./Recursos/instagram-svgrepo-com (1).svg" alt="Instagram"></a>
          <a href="https://www.youtube.com/@actcargentina"><img src="./Recursos/youtube-svgrepo-com.svg" alt="YouTube"></a>
          <a href="https://actc.org.ar/tc/index.html"><img src="./Recursos/global-svgrepo-com.svg" alt="Web"></a>
        </div>
      </div>
    </div>
    <div class="pie-bottom">© 2025 ACTC. Todos los derechos reservados.</div>
  </footer>

</body>
</html>
