<?php
$conexion=mysqli_connect("localhost","root", "","actc");

$nombre = trim($_POST['nombre'] ?? '');
$edad   = ($_POST['edad'] ?? '') !== '' ? (int)$_POST['edad'] : 0; // 0 => lo pasamos a NULL
$ciudad = trim($_POST['ciudad'] ?? '');
$observaciones = trim($_POST['observaciones'] ?? '');
$marca  = trim($_POST['marca'] ?? '');
$numero = ($_POST['numero'] ?? '') !== '' ? (int)$_POST['numero'] : null;

if ($nombre === '' || $marca === '' || $numero === null) {
    echo "faltan datos";
}
$consulta = "INSERT INTO pilotos (nombre, edad, ciudad, observaciones, marca, numero) VALUES ('$nombre', " . ($edad === null ? "NULL" : $edad) . ", '$ciudad', '$observaciones', '$marca', $numero)";
$resultado = mysqli_query($conexion,$consulta);

if ($resultado){
    echo "piloto agregado correctamente: ";
} else {
    echo "error";
}

mysqli_close($conexion);
?>

