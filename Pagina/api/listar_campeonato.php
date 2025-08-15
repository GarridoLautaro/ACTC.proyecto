<?php
// ACTC.proyecto/Pagina/api/listar_campeonato.php

// No mostrar warnings en pantalla (rompen el JSON)
ini_set('display_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/db.php';

try {
    $sql = "SELECT p.id, p.numero, p.nombre, p.puntos, m.nombre AS marca, m.logo
            FROM pilotos p
            LEFT JOIN marcas m ON p.marca_id = m.id
            ORDER BY p.puntos DESC, p.nombre ASC";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
    echo json_encode(['ok' => true, 'data' => $rows], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'ok' => false,
        'error' => 'DB_ERROR',
        'detail' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
