<?php
require __DIR__ . '/../api/auth.php';
require_login();
require_admin();

require_once __DIR__ . '/../api/db.php'; // para listar pilotos

// Traigo pilotos (id, nombre y número) para evitar ambigüedad de nombres
$pilotos = $conn->query("SELECT id, nombre, numero FROM pilotos ORDER BY nombre ASC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Actualizar campeonato — ACTC</title>
  <link rel="stylesheet" href="../style.css?v=8" />
</head>
<body>

  <?php include __DIR__ . '/../parcial/header.php'; ?>

  <main class="contenedor">
    <h1 class="titulo rojo">Actualizar campeonato</h1>

    <form action="../api/actualizar_campeonato.php" method="post" class="caja-form">
      <div class="grilla-form">

        <!-- Piloto -->
        <div class="campo">
          <label for="piloto_id">Piloto</label>
          <select name="piloto_id" id="piloto_id" required>
            <option value="" selected disabled>Seleccioná un piloto…</option>
            <?php while($p = $pilotos->fetch_assoc()): ?>
              <option value="<?= (int)$p['id'] ?>">
                <?= htmlspecialchars($p['nombre']) ?> — #<?= (int)$p['numero'] ?>
              </option>
            <?php endwhile; ?>
          </select>
        </div>

        <!-- Puntos a sumar -->
        <div class="campo">
          <label for="puntos">Puntos sumados</label>
          <input type="number" name="puntos" id="puntos" min="1" max="100" required placeholder="Ej: 10">
        </div>

        <!-- (Opcional) Comentario corto -->
        <div class="campo">
          <label for="nota">Comentario (opcional)</label>
          <textarea name="nota" id="nota" placeholder="Ej: Fecha 3 - Neuquén"></textarea>
        </div>

        <div class="acciones">
          <button type="submit" class="boton">Guardar</button>
          <a href="campeonato.php" class="boton">Volver al campeonato</a>
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
