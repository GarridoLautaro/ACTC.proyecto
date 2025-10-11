<?php
require __DIR__ . '/../api/auth.php'; 

if (is_logged_in()) {
  header('Location: ./inicio.php');
  exit;
}

$msg = '';
if (!empty($_GET['e'])) {
  switch ($_GET['e']) {
    case 'badlogin':       $msg = 'Nombre, apellido o contraseña incorrectos.'; break;
    case 'login_required': $msg = 'Inicia sesión para continuar.';               break;
    case 'forbidden':      $msg = 'No tienes permisos para acceder.';            break;
  }
}
?>

<?php include __DIR__ . '/../parcial/header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <link rel="stylesheet" href="../style.css" />
</head>
<body>

<main class="contenedor">
  <section class="caja caja-form">
    <header class="cabecera">
      <h1 class="titulo rojo">Login</h1>
      <p style="text-align:center; color:#aaa; margin-top:6px;">Inicia sesión para continuar.</p>
    </header>

    <?php if ($msg): ?>
      <div class="alerta alerta-error" style="margin-bottom:12px;"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <form class="grilla-form" action="../api/do_login.php" method="POST">
      <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required placeholder="Ej: Juan">
      </div>
      <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" required placeholder="Perez">
      </div>
      <div class="campo">
        <label for="pass">Contraseña</label>
        <input type="password" id="pass" name="pass" required placeholder="Password">
      </div>
      <div class="acciones-centro">
        <button type="reset" class="boton boton-borde">Cancelar</button>
        <button type="submit" class="boton boton-primario">Entrar</button>
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
        <li><a href="./inicio.php">Inicio</a></li>
        <li><a href="./calendario.php">Calendario</a></li>
        <li><a href="./campeonato.php">Resultados</a></li>
        <li><a href="./login.php">Login</a></li>
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
</htm
