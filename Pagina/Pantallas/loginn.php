<?php
require __DIR__ . '/../api/auth.php';
if (is_logged_in()) { header('Location: ./inicio.php'); exit; }

// Mensajes
$msg = '';
if (!empty($_GET['e'])) {
  switch ($_GET['e']) {
    case 'badlogin':       $msg = 'Nombre, apellido o contraseña incorrectos.'; break;
    case 'login_required': $msg = 'Inicia sesión para continuar.';               break;
    case 'forbidden':      $msg = 'No tienes permisos para acceder.';            break;
  }
}

// Next (a dónde volver después)
$next = $_GET['next'] ?? ($_SERVER['HTTP_REFERER'] ?? './inicio.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Login</title>
  <link rel="stylesheet" href="../style.css"/>
</head>
<body>
  <main class="caja-form">
    <h1 class="titulo">Iniciar sesión</h1>

    <?php if ($msg): ?>
      <div class="alert error" role="alert"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <form action="../api/do_login.php" method="post" class="grilla-form">
      <input type="hidden" name="next" value="<?= htmlspecialchars($next) ?>"/>

      <div class="campo">
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Lautaro" required>
      </div>

      <div class="campo">
        <label>Apellido</label>
        <input type="text" name="apellido" placeholder="Garrido" required>
      </div>

      <div class="campo">
        <label>Contraseña</label>
        <input type="password" name="password" placeholder="•••" required>
      </div>

      <div class="acciones">
        <button class="boton" type="submit">Entrar</button>
        <a class="boton" href="./inicio.php">Cancelar</a>
      </div>
    </form>
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
