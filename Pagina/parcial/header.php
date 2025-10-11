<?php
require_once __DIR__ . '/../api/auth.php';
?>
<link rel="stylesheet" href="/ACTC.proyecto/Pagina/style.css">

<nav class="navbar">
  <div class="logo">
    <img src="/ACTC.proyecto/Pagina/Pantallas/Recursos/LOGO.png" alt="Logo ACTC">
  </div>
  <ul class="enlaces">
    <li><a href="/ACTC.proyecto/Pagina/Pantallas/inicio.php">INICIO</a></li>
    <li><a href="/ACTC.proyecto/Pagina/Pantallas/campeonato.php">CAMPEONATO</a></li>
    <li><a href="/ACTC.proyecto/Pagina/Pantallas/calendario.php">CALENDARIO</a></li>
    <li><a href="../logout.php" class="boton boton-secundario">Cerrar sesión</a></li>

    <?php if (is_admin()): ?>
      <li><a href="/ACTC.proyecto/Pagina/Pantallas/registro.php" class="activo">REGISTRO</a></li>
    <?php endif; ?>

    <?php if (current_user_id()): ?>
      <li><a href="/ACTC.proyecto/Pagina/api/logout.php">SALIR</a></li>
    <?php else: ?>
      <li><a href="/ACTC.proyecto/Pagina/Pantallas/loginn.php" class="activo">LOGIN</a></li>
    <?php endif; ?>
  </ul>
</nav>
