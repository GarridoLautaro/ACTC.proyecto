<?php
$host = "localhost";
$db   = "actc";
$user = "root"; // o tu usuario propio
$pass = "";     // en XAMPP suele estar vacío

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, $options);
} catch (Exception $e) {
    http_response_code(500);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["error"=>"DB connection failed","detail"=>$e->getMessage()]);
    exit;
}

header('Content-Type: application/json; charset=utf-8');
