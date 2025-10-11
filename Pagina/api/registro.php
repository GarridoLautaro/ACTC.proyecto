<?php
require __DIR__.'/db.php';
require __DIR__.'/auth.php';

$nombre   = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$pass     = $_POST['pass'] ?? '';

if($nombre==='' || strlen($pass)<4){
    header("Location: /login.php?e=badreg"); exit;
}

$hash = password_hash($pass, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO usuario (nombre, apellido, `contraseña`) VALUES (?,?,?)");
$stmt->execute([$nombre, $apellido, $hash]);

login_user((int)$pdo->lastInsertId()); // inicia sesión automático
header("Location: /inicio.php");

?>