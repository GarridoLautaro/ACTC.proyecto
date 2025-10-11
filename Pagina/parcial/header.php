<?php
require_once __DIR__ . '/../api/auth.php'; // helpers de sesión; NO redirecciona
?>
<link rel="stylesheet" href="/ACTC.proyecto/Pagina/style.css">

<nav class="navbar">
  <div class="logo">
    <a href="/ACTC.proyecto/Pagina/Pantallas/inicio.php">
      <img src="/ACTC.proyecto/Pagina/Pantallas/Recursos/LOGO.png" alt="Logo ACTC">
    </a>
  </div>

  <ul class="enlaces">
    <li><a href="/ACTC.proyecto/Pagina/Pantallas/inicio.php">INICIO</a></li>
    <li><a href="/ACTC.proyecto/Pagina/Pantallas/campeonato.php">CAMPEONATO</a></li>
    <li><a href="/ACTC.proyecto/Pagina/Pantallas/calendario.php">CALENDARIO</a></li>

    <!-- Mostrar REGISTRO solo si es admin -->
    <?php if (is_admin()): ?>
      <li><a href="/ACTC.proyecto/Pagina/Pantallas/registro.php">REGISTRO</a></li>
    <?php endif; ?>

    <?php if (is_logged_in()): ?>
      <li><a href="/ACTC.proyecto/Pagina/logout.php" class="boton boton-secundario">Cerrar sesión</a></li>
    <?php else: ?>
      <li><a href="/ACTC.proyecto/Pagina/Pantallas/<?= LOGIN_FILE ?>" class="activo">LOGIN</a></li>
    <?php endif; ?>
  </ul>
</nav>
