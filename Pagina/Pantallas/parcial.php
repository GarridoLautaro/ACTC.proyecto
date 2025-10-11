<?php require_once __DIR__.'/../api/auth.php'; ?>
<link rel="stylesheet" href="/style.css">
<nav class="navbar">
  <div class="logo"><img src="/Recursos/LOGO.png" alt="Logo ACTC"></div>
  <ul class="enlaces">
    <li><a href="/inicio.php">INICIO</a></li>
    <li><a href="/campeonato.php">CAMPEONATO</a></li>
    <li><a href="/calendario.php">CALENDARIO</a></li>
    <?php if (is_admin()): ?>
      <li><a href="/registro.php" class="activo">REGISTRO</a></li>
    <?php endif; ?>
    <?php if (current_user_id()): ?>
      <li><a href="/logout.php">SALIR</a></li>
    <?php else: ?>
      <li><a href="/loginn.php" class="activo">LOGIN</a></li>
    <?php endif; ?>
  </ul>
</nav>
