<?php
require __DIR__ . '/db.php';
require __DIR__ . '/auth.php';

// Tomo campos del formulario (con fallback por si el name difiere)
$nombre   = trim($_POST['nombre']   ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$pass     = $_POST['pass'] 
         ?? $_POST['password'] 
         ?? $_POST['contrasena'] 
         ?? '';

if ($nombre === '' || $apellido === '' || $pass === '') {
  header("Location: ../login.php?e=datos_faltantes");
  exit;
}

$sql = "SELECT id_usuario, `contraseña` AS contrasena
        FROM `usuarios`
        WHERE nombre = ? AND apellido = ?
        LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute([$nombre, $apellido]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($pass, $user['contrasena'])) {
  login_user((int)$user['id_usuario']);  
  header("Location: ../Pantallas/inicio.php");
  exit;
} else {
  header("Location: ../login.php?e=badlogin"); 
  exit;
}

?>