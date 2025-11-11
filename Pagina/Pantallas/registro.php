<?php
require __DIR__ . '/../api/auth.php';
require_login();
require_admin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro ACTC</title>
  <link rel="stylesheet" href="../style.css?v=7" />
</head>
<body class="registro-page">

  <?php include __DIR__ . '/../parcial/header.php'; ?>

  <main class="registro-container contenedor">
    <section class="registro-card hero-registro">
      <!-- Imagen arriba -->
      <img src="./Recursos/registro_img.jpg" alt="Carrera ACTC" class="registro-img" />

      <!-- Texto + botones DEBAJO de la imagen -->
      <div class="panel-bajo">
        <h1 class="registro-title">Asociación Corredores de Turismo Carretera (ACTC)</h1>

        <p class="lead">
          La ACTC regula y organiza el Turismo Carretera, la categoría más antigua y popular del automovilismo argentino.
        </p>
        <p>
          Reúne a los mejores pilotos y equipos en un calendario federal que combina tradición y modernidad,
          promoviendo nuevos talentos y espectáculos de alto nivel.
        </p>

        <h2 class="registro-sub">¿Qué desea registrar?</h2>

        <div class="registro-actions">
          <a class="btn btn-cta btn-grad-red" href="./registropiloto.php">Registrar piloto</a>
          <a class="btn btn-cta btn-grad-indigo" href="./registrocampeonato.php">Actualizar campeonato</a>
        </div>
      </div>
    </section>
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
