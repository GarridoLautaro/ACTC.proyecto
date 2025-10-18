<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../Pantallas/registrocampeonato.php'); exit;
}

$numero = (int)($_POST['numero'] ?? 0);
$sumar  = (int)($_POST['puntos'] ?? 0);

if ($numero <= 0 || $sumar === 0) {
  echo "<script>alert('Datos inválidos'); history.back();</script>"; exit;
}

$sel = $conn->prepare("SELECT puntos FROM pilotos WHERE numero = ?");
$sel->bind_param("i", $numero);
$sel->execute(); $sel->store_result();
if ($sel->num_rows === 0) { $sel->close();
  echo "<script>alert('Piloto no encontrado'); history.back();</script>"; exit;
}
$sel->bind_result($puntosActuales); $sel->fetch(); $sel->close();

$nuevo = $puntosActuales + $sumar;

$upd = $conn->prepare("UPDATE pilotos SET puntos = ? WHERE numero = ?");
$upd->bind_param("ii", $nuevo, $numero);
$upd->execute(); $upd->close();

echo "<script>alert('Puntos actualizados: {$puntosActuales} → {$nuevo}'); window.location='../Pantallas/campeonato.php';</script>";
