<?php
$user = "root";
$pass = "";
$host = "localhost";
$db = "actc";

$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    die ("error de conexion: " .mysqli_connect_error());
} else {
    echo "conectado correctamente";
}
?>