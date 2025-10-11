<?php
// Pagina/api/do_register.php
require __DIR__ . '/db.php';
require __DIR__ . '/auth.php';

// Solo admin puede crear usuarios desde aquí
if (!is_logged_in() || !is_admin()) {
  header('Location: ' . URL_BASE . '/' . LOGIN_FILE . '?e=forbidden');
  exit;
}

$nombre   = trim($_POST['nombre']   ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$pass     = $_POST['pass'] ?? '';

// Validaciones mínimas
if ($nombre === '' || $apellido === '' || strlen($pass) < 3) {
  header('Location: ../Pantallas/registro.php?e=badreg');
  exit;
}

// Evitar duplicados (nombre+apellido)
$stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE nombre = ? AND apellido = ? LIMIT 1");
$stmt->execute([$nombre, $apellido]);
$exists = $stmt->fetch(PDO::FETCH_ASSOC);
if ($exists) {
  header('Location: ../Pantallas/registro.php?e=exists');
  exit;
}

// Insert seguro con hash
$hash = password_hash($pass, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, `contraseña`) VALUES (:n, :a, :p)");
$ok = $stmt->execute([':n' => $nombre, ':a' => $apellido, ':p' => $hash]);

if ($ok) {
  // opcional: no iniciar sesión del usuario creado. Aquí NO lo iniciamos.
  header('Location: ../Pantallas/registro.php?ok=created');
  exit;
} else {
  header('Location: ../Pantallas/registro.php?e=error');
  exit;
}

?>