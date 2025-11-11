<?php
require_once __DIR__ . '/auth.php';
require_admin(); // seguridad: solo admin actualiza

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../Pantallas/registrocampeonato.php');
  exit;
}

$pilotoId = (int)($_POST['piloto_id'] ?? 0);
$sumar    = (int)($_POST['puntos'] ?? 0);
$nota     = trim($_POST['nota'] ?? '');

if ($pilotoId <= 0 || $sumar <= 0) {
  echo "<script>alert('Completá piloto y puntos correctamente.'); history.back();</script>";
  exit;
}

// Verifico que el piloto exista y leo puntos actuales
$sel = $conn->prepare("SELECT puntos, nombre FROM pilotos WHERE id = ?");
$sel->bind_param("i", $pilotoId);
$sel->execute();
$sel->store_result();

if ($sel->num_rows === 0) {
  $sel->close();
  echo "<script>alert('Piloto no encontrado'); history.back();</script>";
  exit;
}

$sel->bind_result($puntosActuales, $nombrePiloto);
$sel->fetch();
$sel->close();

$nuevo = $puntosActuales + $sumar;

// Actualizo puntos
$upd = $conn->prepare("UPDATE pilotos SET puntos = ? WHERE id = ?");
$upd->bind_param("ii", $nuevo, $pilotoId);
$upd->execute();
$upd->close();



$nombreJS = htmlspecialchars($nombrePiloto, ENT_QUOTES, 'UTF-8');
$msg = "Puntos actualizados para {$nombreJS}: {$puntosActuales} → {$nuevo} (+{$sumar})";

echo "<script>alert('".$msg."'); window.location='../Pantallas/campeonato.php';</script>";
