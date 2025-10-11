<?php
$dsn = "mysql:host=localhost;dbname=actc;charset=utf8mb4";
$user = "root";
$pass = ""; // XAMPP por defecto
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $user, $pass, $options);

?>