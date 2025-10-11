<?php
require __DIR__ . '/db.php';
require __DIR__ . '/auth.php';

$nombre   = trim($_POST['nombre']   ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$pass     = $_POST['pass'] ?? $_POST['password'] ?? '';

if ($nombre === '' || $apellido === '' || $pass === '') {
  header('Location: ../Pantallas/' . LOGIN_FILE . '?e=badlogin');
  exit;
}

$stmt = $pdo->prepare("
  SELECT id_usuario, `contraseña` AS contrasena
  FROM usuarios
  WHERE nombre = ? AND apellido = ?
  LIMIT 1
");
$stmt->execute([$nombre, $apellido]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && $pass === $user['contrasena']) {
  login_user((int)$user['id_usuario']);
  header('Location: ../Pantallas/inicio.php');
  exit;
}

// Si falla:
header('Location: ../Pantallas/' . LOGIN_FILE . '?e=badlogin');
exit;
