
<?php
require __DIR__ . '/db.php';
$raw = file_get_contents('php://input');
$input = $_POST ?: (json_decode($raw, true) ?? []);
$nombre = trim($input['nombre'] ?? '');
$edad   = isset($input['edad']) ? (int)$input['edad'] : null;
$numero = isset($input['numero']) ? (int)$input['numero'] : null;
$marca  = trim($input['marca'] ?? '');
$ciudad = trim($input['ciudad'] ?? '');
$obs    = trim($input['observaciones'] ?? '');

if ($nombre === '' || !$numero) {
    http_response_code(422);
    echo json_encode(["ok"=>false,"msg"=>"Nombre y número son obligatorios"]);
    exit;
}

$marca_id = null;
if ($marca !== '') {
    $s = $pdo->prepare("SELECT id FROM marcas WHERE nombre=?");
    $s->execute([$marca]);
    $r = $s->fetch();
    if ($r) $marca_id = (int)$r['id']; else {
        $s = $pdo->prepare("INSERT INTO marcas (nombre) VALUES (?)");
        $s->execute([$marca]);
        $marca_id = (int)$pdo->lastInsertId();
    }
}

$stmt = $pdo->prepare("INSERT INTO pilotos (nombre, edad, numero, ciudad, observaciones, marca_id)
                    VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$nombre, $edad, $numero, $ciudad, $obs, $marca_id]);

echo json_encode(["ok"=>true, "id"=>(int)$pdo->lastInsertId()]);
