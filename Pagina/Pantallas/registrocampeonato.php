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
  <title>Actualizar Campeonato</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<main class="contenedor">
  <section class="caja caja-form">
    <header class="cabecera">
      <h1 class="titulo rojo">Actualizar Campeonato</h1>
      <p style="color:#999; margin-top:6px">Cargá el puntaje sumado por un piloto.</p>
    </header>

    <form class="grilla-form" action="../api/actualizar_campeonato.php" method="POST">
      <div class="campo">
        <label for="numero">Número de piloto</label>
        <input type="number" id="numero" name="numero" min="0" max="9999" required placeholder="Ej: 17">
      </div>

      <div class="campo">
        <label for="puntos">Puntaje</label>
        <input type="number" id="puntos" name="puntos" step="0.1" min="0" required placeholder="Ej: 12.5">
        <small style="color:#888">Usá decimales si aplica (formato 6,1 como en la tabla).</small>
      </div>

      <div class="acciones-centro">
        <button type="reset" class="boton boton-borde">Cancelar</button>
        <button type="submit" class="boton boton-primario">Actualizar</button>
      </div>
    </form>
  </section>
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
