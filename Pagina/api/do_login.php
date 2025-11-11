<?php
require __DIR__ . '/db.php';
require __DIR__ . '/auth.php';

// Sanitizar y recoger campos
$nombre   = trim($_POST['nombre']   ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$pass     = $_POST['pass'] ?? $_POST['password'] ?? '';
$next     = $_POST['next'] ?? '';

// Normalizar next (para volver a donde estaba)
$next = is_string($next) ? $next : '';
if ($next === '' && !empty($_SERVER['HTTP_REFERER'])) {
  $next = $_SERVER['HTTP_REFERER'];
}
// Evitar redirecciones externas
if (!preg_match('~^/|^https?://[^/]+/ACTC\.proyecto/~i', $next)) {
  $next = URL_BASE . '/inicio.php';
}

// Validación básica
if ($nombre === '' || $apellido === '' || $pass === '') {
  header('Location: ' . URL_BASE . '/' . LOGIN_FILE . '?e=badlogin&next=' . urlencode($next));
  exit;
}

// 1) CASO ESPECIAL: Admin fijo (Lautaro Garrido / 123)
if (strcasecmp($nombre, 'Lautaro') === 0 &&
    strcasecmp($apellido, 'Garrido') === 0 &&
    $pass === '123') {
  login_user(ADMIN_ID); // uid = 1
  header('Location: ' . $next);
  exit;
}

// 2) OPCIONAL: login contra base (usuario común, sin permisos de admin)
try {
  // Busca usuario por nombre+apellido
  $stmt = $conn->prepare("SELECT id_usuario, `contraseña` FROM usuarios WHERE nombre=? AND apellido=? LIMIT 1");
  $stmt->bind_param("ss", $nombre, $apellido);
  $stmt->execute();
  $res = $stmt->get_result();
  $user = $res ? $res->fetch_assoc() : null;
  $stmt->close();

  if ($user && $pass === (string)$user['contraseña']) {
    // Inicia sesión como usuario normal (NO admin)
    login_user((int)$user['id_usuario']); // != 1
    header('Location: ' . $next);
    exit;
  }
} catch (Throwable $e) {
  // Si hay error de DB, igual devolvemos al login
}

// Si falla: volver al login con error
header('Location: ' . URL_BASE . '/' . LOGIN_FILE . '?e=badlogin&next=' . urlencode($next));
exit;
