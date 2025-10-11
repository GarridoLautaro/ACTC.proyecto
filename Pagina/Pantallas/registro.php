<?php require __DIR__ . '/api/auth.php'; require_admin(); ?>
<?php include __DIR__ . '/partials/header.php'; ?>

!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Registro ACTC</title>
    <link rel="stylesheet" href="../style.css" />
</head>
<body class="fondo-registro">

<nav class="navbar">
    <div class="logo">
        <img src="Recursos/LOGO.png" alt="Logo ACTC" />
    </div>
        <ul class="enlaces">
        <li><a href="inicio.php">INICIO</a></li>
        <li><a href="campeonato.php">CAMPEONATO</a></li>
        <li><a href="calendario.php">CALENDARIO</a></li>
        <li><a href="loginn.php" class="activo">LOGIN</a></li>
        <li><a href="registro.php" class="activo">REGISTRO</a></li>
    </ul>
</nav>

<main class="contenedor">
    <div class="caja">
        <img src="Recursos/registro_img.jpg" alt="Carrera ACTC" class="imagen" />
        <div class="info">
            <h1 class="titulo">Asociación Corredores de Turismo Carretera (ACTC)</h1>
            <p class="parrafo">La ACTC regula y organiza el Turismo Carretera, la categoría más antigua y popular del automovilismo argentino.</p>
            <p class="parrafo">Con un calendario federal, combina tradición y modernidad, promoviendo el crecimiento de nuevos talentos.</p>
            <h2 class="sub">¿Qué desea registrar?</h2>
            <div class="acciones">
                <a class="boton" href="registropiloto.html">Registrar piloto</a>
                <a class="boton" href="registrocampeonato.html">Actualizar campeonato</a>
            </div>
        </div>
    </div>
</main>

<footer class="pie">
    <div class="pie-contenedor">
        <div class="pie-logo"><img src="./Recursos/marcas/logoactc.png" alt="ACTC Logo"></div>
        <div class="pie-links">
            <h3>TC</h3>
            <ul>
                <li><a href="./inicio.html">Inicio</a></li>
                <li><a href="./calendario.html">Calendario</a></li>
                <li><a href="./campeonato.html">Resultados</a></li>
                <li><a href="./registro.html">Registro</a></li>
            </ul>
        </div>
        <div class="pie-redes">
            <h3>Seguinos</h3>
            <div class="redes-iconos">
                <a href="https://www.instagram.com/actcargentina"><img src="./Recursos/instagram-svgrepo-com (1).svg" alt="Instagram"></a>
                <a href="https://www.youtube.com/@actcargentina"><img src="./Recursos/youtube-svgrepo-com.svg" alt="YouTube"></a>
                <a href="https://actc.org.ar/tc/index.html"><img src="./Recursos/global-svgrepo-com.svg" alt="Web"></a>
            </div>
        </div>
    </div>
    <div class="pie-bottom">© 2025 ACTC. Todos los derechos reservados.</div>
</footer>
</body>
</html>
