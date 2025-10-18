<?php
require __DIR__ . '/../api/auth.php';
require_login();
require_admin();

include __DIR__ . '/../parcial/header.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registro ACTC</title>
  <link rel="stylesheet" href="../style.css" />
</head>
<body class="registro-page">

<main class="registro-container">
  <div class="registro-card">
    <img src="./Recursos/registro_img.jpg" alt="Carrera ACTC" class="registro-img" />

    <div class="registro-info">
      <h1>Asociación Corredores de Turismo Carretera (ACTC)</h1>
      <p>
        La ACTC regula y organiza el Turismo Carretera, la categoría más antigua y popular del automovilismo argentino.
        Reúne a los mejores pilotos y equipos, llevando la pasión por las carreras a todo el país.
      </p>
      <p>
        Con un calendario federal en los principales autódromos, combina tradición y modernidad, promoviendo el
        crecimiento de nuevos talentos y espectáculos de alto nivel.
      </p>

      <h2>¿Qué desea registrar?</h2>

      <div class="registro-actions">
        <a class="btn btn-primary" href="./registropiloto.php" aria-label="Registrar un piloto">
          Registrar piloto
        </a>
        <a class="btn btn-outline" href="./registrocampeonato.php" aria-label="Actualizar datos del campeonato">
          Actualizar campeonato
        </a>
      </div>
    </div>
  </div>
</main>

<footer class="pie">
    <div class="pie-contenedor">
        <div class="pie-logo"><img src="./Recursos/marcas/logoactc.png" alt="ACTC"></div>
        <div class="pie-links">
            <h3>TC</h3>
            <ul>
                <li><a href="./inicio.html">Inicio</a></li>
                <li><a href="./calendario.html">Calendario</a></li>
                <li><a href="./campeonato.html">Resultados</a></li>
                <li><a href="./registro.html">Registro</a></li>
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
