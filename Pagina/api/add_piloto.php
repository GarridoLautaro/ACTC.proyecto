<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ../Pantallas/registropiloto.php'); exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$edad   = (int)($_POST['edad'] ?? 0);
$numero = (int)($_POST['numero'] ?? 0);
$marca  = (int)($_POST['marca'] ?? 0);
$ciudad = trim($_POST['ciudad'] ?? '');
$obs    = trim($_POST['observaciones'] ?? '');
$puntos = 0;

if ($nombre === '' || $edad <= 0 || $numero <= 0 || $marca <= 0 || $ciudad === '') {
  echo "<script>alert('Faltan datos obligatorios'); history.back();</script>"; exit;
}

$mk = $conn->prepare("SELECT 1 FROM marcas WHERE id = ?");
$mk->bind_param("i", $marca);
$mk->execute(); $mk->store_result();
if ($mk->num_rows === 0) { $mk->close();
  echo "<script>alert('La marca seleccionada no existe'); history.back();</script>"; exit;
}
$mk->close();

$chk = $conn->prepare("SELECT id FROM pilotos WHERE numero = ?");
$chk->bind_param("i", $numero);
$chk->execute(); $chk->store_result();
if ($chk->num_rows > 0) { $chk->close();
  echo "<script>alert('El número de piloto ya está registrado'); history.back();</script>"; exit;
}
$chk->close();

$sql = $conn->prepare(
  "INSERT INTO pilotos (nombre, edad, numero, marca, ciudad, observaciones, puntos)
   VALUES (?, ?, ?, ?, ?, ?, ?)"
);
$sql->bind_param("siiissi", $nombre, $edad, $numero, $marca, $ciudad, $obs, $puntos);
$sql->execute(); $sql->close();

echo "<script>alert('Piloto agregado correctamente'); window.location='../Pantallas/campeonato.php';</script>";
