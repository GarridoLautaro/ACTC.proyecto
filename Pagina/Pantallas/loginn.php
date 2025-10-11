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
if (!empty($_GET['ok']) && $_GET['ok'] === 'registered') {
  $msg = 'Usuario creado. Iniciá sesión.';
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

</body>
</html>
