<?php
require __DIR__ . '/../api/auth.php';  // NO require_login()
include __DIR__ . '/../parcial/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Campeonato ACTC</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<main class="tabla">
  <div class="tabla-encabezado">
    <div>POS.</div><div>NÚMERO</div><div>PILOTO</div><div>MARCA</div><div>PTOS.</div>
  </div>
  <div id="tabla-body"></div>
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
