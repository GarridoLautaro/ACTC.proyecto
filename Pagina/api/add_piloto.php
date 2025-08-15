
<?php
require __DIR__ . '/db.php';

$raw   = file_get_contents('php://input');
$input = $_POST ?: (json_decode($raw, true) ?? []);

// NUEVO: ID manual (opcional)
$id_manual = isset($input['id']) && $input['id'] !== '' ? (int)$input['id'] : null;

$nombre = trim($input['nombre'] ?? '');
$edad   = isset($input['edad']) ? (int)$input['edad'] : null;
$numero = isset($input['numero']) ? (int)$input['numero'] : null;
$marca  = trim($input['marca'] ?? '');
$ciudad = trim($input['ciudad'] ?? '');
$obs    = trim($input['observaciones'] ?? '');

if ($nombre === '' || !$numero) {
    http_response_code(422);
    echo json_encode(["ok"=>false, "msg"=>"Nombre y número son obligatorios"]);
    exit;
}

// Garantizar marca_id (crea si no existe)
$marca_id = null;
if ($marca !== '') {
    $s = $pdo->prepare("SELECT id FROM marcas WHERE nombre = ?");
    $s->execute([$marca]);
    $r = $s->fetch();
    if ($r) {
        $marca_id = (int)$r['id'];
    } else {
        $s = $pdo->prepare("INSERT INTO marcas (nombre) VALUES (?)");
        $s->execute([$marca]);
        $marca_id = (int)$pdo->lastInsertId();
    }
}

try {
    if ($id_manual) {
    // Verificar que no exista ese ID
    $chk = $pdo->prepare("SELECT 1 FROM pilotos WHERE id = ?");
    $chk->execute([$id_manual]);
    if ($chk->fetch()) {
        http_response_code(409);
        echo json_encode(["ok"=>false, "msg"=>"El ID de piloto ya existe. Elegí otro o dejá vacío para automático."]);
        exit;
    }

    // Insert CON ID explícito
    $stmt = $pdo->prepare(
        "INSERT INTO pilotos (id, nombre, edad, numero, ciudad, observaciones, marca_id)
        VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->execute([$id_manual, $nombre, $edad, $numero, $ciudad, $obs, $marca_id]);
    $newId = $id_manual;

    } else {
      // Insert SIN ID (usa AUTO_INCREMENT)
        $stmt = $pdo->prepare(
            "INSERT INTO pilotos (nombre, edad, numero, ciudad, observaciones, marca_id)
            VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->execute([$nombre, $edad, $numero, $ciudad, $obs, $marca_id]);
        $newId = (int)$pdo->lastInsertId();
    }

echo json_encode(["ok"=>true, "id"=>$newId]);

} catch (PDOException $e) {
  // 1062 = duplicate entry
    if ($e->getCode() === '23000') {
        http_response_code(409);
        echo json_encode(["ok"=>false, "msg"=>"Conflicto: ID o datos duplicados.", "detail"=>$e->getMessage()]);
    } else {
    http_response_code(500);
    echo json_encode(["ok"=>false, "msg"=>"Error al registrar piloto.", "detail"=>$e->getMessage()]);
}
}
