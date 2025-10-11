<?php
require_once __DIR__ . '/db.php';

$nombre    = $_POST['nombre']   ?? 'Lautaro';
$apellido  = $_POST['apellido'] ?? 'Garrido';
$passPlano = $_POST['pass'] ?? '123';
$hash      = password_hash($passPlano, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, apellido, contraseña) VALUES (:n, :a, :p)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':n' => $nombre,
    ':a' => $apellido,
    ':p' => $hash
]);


echo json_encode(['ok' => true]); 

?>