<?php include __DIR__ . '/parcial/header.php'; ?>
<main class="contenedor">
  <section class="caja caja-form">
    <header class="cabecera"><h1 class="titulo rojo">Login</h1></header>

    <!-- Importante: nombres que espera do_login.php -->
    <form class="grilla-form" action="api/do_login.php" method="POST">
      <div class="campo">
        <label>Nombre</label>
        <input type="text" name="nombre" required>
      </div>
      <div class="campo">
        <label>Apellido</label>
        <input type="text" name="apellido" required>
      </div>
      <div class="campo">
        <label>Contraseña</label>
        <input type="password" name="pass" required>
      </div>
      <div class="acciones-centro">
        <button class="boton boton-primario">Entrar</button>
      </div>
    </form>
  </section>

  <section class="caja caja-form" style="margin-top:1rem">
    <header class="cabecera"><h1 class="titulo rojo">Registrarse</h1></header>

    <!-- Si tu registro real es add_usuario.php, usa ese endpoint -->
    <form class="grilla-form" action="api/add_usuario.php" method="POST">
      <div class="campo">
        <label>Nombre</label>
        <input type="text" name="nombre" required>
      </div>
      <div class="campo">
        <label>Apellido</label>
        <input type="text" name="apellido" required>
      </div>
      <div class="campo">
        <label>Contraseña</label>
        <input type="password" name="pass" placeholder="(opcional si lo fijas a 123)" >
      </div>
      <div class="acciones-centro">
        <button class="boton boton-primario">Crear cuenta</button>
      </div>
    </form>
  </section>
</main>

?>