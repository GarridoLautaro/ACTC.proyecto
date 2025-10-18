<?php
$dbHost = '127.0.0.1';
$dbUser = 'root';
$dbPass = '';
$dbName = 'actc';

mysqli_report(MYSQLI_REPORT_OFF); // evitamos warnings ruidosos

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_errno) {
    http_response_code(500);
    die('Error de conexión a MySQL: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
