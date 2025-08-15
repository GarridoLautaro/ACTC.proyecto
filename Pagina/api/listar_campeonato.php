<?php
require __DIR__ . '/db.php';
$sql = "SELECT p.id, p.numero, p.nombre, p.puntos, m.nombre AS marca, m.logo
        FROM pilotos p
        LEFT JOIN marcas m ON p.marca_id = m.id
        ORDER BY p.puntos DESC, p.nombre ASC";
$rows = $pdo->query($sql)->fetchAll();
echo json_encode(["ok"=>true, "data"=>$rows]);
