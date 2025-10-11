<?php require __DIR__ . '/api/auth.php'; require_admin(); ?>
<?php include __DIR__ . '/partials/header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Actualizar Campeonato</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

<nav class="navbar">
  <div class="logo"><img src="Recursos/LOGO.png" alt="Logo ACTC" /></div>
    <ul class="enlaces">
        <li><a href="inicio.php">INICIO</a></li>
        <li><a href="campeonato.php">CAMPEONATO</a></li>
        <li><a href="calendario.php">CALENDARIO</a></li>
        <li><a href="loginn.php" class="activo">LOGIN</a></li>
        <li><a href="registro.php" class="activo">REGISTRO</a></li>
    </ul>
</nav>

<main class="contenedor">
  <!-- SOLO este cambio: caja -> caja caja-form -->
  <section class="caja caja-form">
    <header class="cabecera">
      <h1 class="titulo rojo">Actualizar Campeonato</h1>
    </header>

    <form id="form-campeonato" action="/ACTC.proyecto/Pagina/api/actualizar_campeonato.php" method="post" novalidate>
      <div class="grilla-form">
        <div class="campo">
          <label for="piloto_id">ID de Piloto</label>
          <input id="piloto_id" name="piloto_id" type="number" placeholder="Ej: 23" min="1" required />
        </div>
        <div class="campo">
          <label for="puntaje">Puntaje sumado</label>
          <input id="puntaje" name="puntaje" type="number" inputmode="decimal" placeholder="Ej: 15" />
        </div>
      </div>

      <div class="grilla-form">
        <div class="campo">
          <label for="marca">Marca</label>
          <select id="marca" name="marca" required>
            <option value="">Seleccioná una marca</option>
            <option>Ford</option>
            <option>Chevrolet</option>
            <option>Toyota</option>
            <option>Renault</option>
          </select>
        </div>
      </div>

      <div class="acciones derecha">
        <button type="reset" class="boton boton-borde">Cancelar</button>
        <button type="submit" class="boton boton-primario">Actualizar</button>
      </div>
    </form>
  </section>
</main>

<footer class="pie">
  <div class="pie-contenedor">
    <div class="pie-logo"><img src="./Recursos/marcas/logoactc.png" alt="ACTC Logo"></div>
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
