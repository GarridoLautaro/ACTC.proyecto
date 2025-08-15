<?php
require __DIR__ . '/db.php';
ini_set('display_errors', 0);
error_reporting(E_ALL);

$raw   = file_get_contents('php://input');
$input = $_POST ?: (json_decode($raw, true) ?? []);

$piloto_id = (int)($input['piloto_id'] ?? 0);
$puntaje   = (float)($input['puntaje'] ?? 0);
$marca     = trim($input['marca'] ?? '');

if ($piloto_id <= 0) {
    http_response_code(422);
    echo json_encode(["ok"=>false,"msg"=>"ID piloto inválido"]);
    exit;
}

$marca_id = null;
if ($marca !== '') {
    $s = $pdo->prepare("SELECT id FROM marcas WHERE nombre=?");
    $s->execute([$marca]);
    $r = $s->fetch();
    if ($r) $marca_id = (int)$r['id']; 
    else {
        $s = $pdo->prepare("INSERT INTO marcas (nombre) VALUES (?)");
        $s->execute([$marca]);
        $marca_id = (int)$pdo->lastInsertId();
    }
}

try {
    if ($marca_id) {
        $sql = "UPDATE pilotos SET puntos = puntos + ?, marca_id = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$puntaje, $marca_id, $piloto_id]);
    } else {
        $sql = "UPDATE pilotos SET puntos = puntos + ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$puntaje, $piloto_id]);
    }
    echo json_encode(["ok"=>true]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(["ok"=>false,"msg"=>"Error al actualizar","detail"=>$e->getMessage()]);
}
