<?php
require __DIR__ . '/../api/auth.php'; 
include __DIR__ . '/../parcial/header.php';
require_once __DIR__ . '/../api/db.php';

$sql = "SELECT p.numero, p.nombre, p.puntos,
        m.logo_url AS logo, m.nombre AS marca_nombre
        FROM pilotos p
        INNER JOIN marcas m ON p.marca = m.id
        ORDER BY p.puntos DESC, p.nombre ASC";
$res   = $conn->query($sql);
$filas = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Campeonato ACTC</title>
  <link rel="stylesheet" href="../style.css?v=18">
</head>
<body>
  <main class="contenedor">
    <div class="tabla-wrap">
      <table class="tabla-actc">
        <thead>
          <tr>
            <th class="col-pos">POS.</th>
            <th class="col-num">NÚMERO</th>
            <th class="col-piloto">PILOTO</th>
            <th class="col-marca">MARCA</th>
            <th class="col-puntos">PUNTAJE</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!$filas): ?>
            <tr><td colspan="5">No hay datos para mostrar</td></tr>
          <?php else: $pos=1; foreach ($filas as $f): ?>
            <?php
              // logo_url se guarda relativo a /Pagina (ej: Pantallas/Recursos/marcas/ford.png)
              $logoRel = $f['logo'] ? "../" . ltrim($f['logo'], "/") : "";
              $marcaHtml = $logoRel ? "<img src='{$logoRel}' alt='".htmlspecialchars($f['marca_nombre'])."'>"
                                    : htmlspecialchars($f['marca_nombre']);
            ?>
            <tr>
              <td class="pos-celda"><span class="pos-badge"><?= $pos ?></span></td>
              <td class="num"><?= (int)$f['numero'] ?></td>
              <td class="piloto"><?= strtoupper(htmlspecialchars($f['nombre'])) ?></td>
              <td class="marca"><?= $marcaHtml ?></td>
              <td class="puntos"><?= htmlspecialchars($f['puntos']) ?></td>
            </tr>
          <?php $pos++; endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
