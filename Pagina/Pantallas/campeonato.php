<?php
require_once __DIR__ . '/../api/db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Campeonato — ACTC</title>
  <link rel="stylesheet" href="../style.css?v=11" />
</head>
<body>

<?php include __DIR__ . '/../parcial/header.php'; ?>

<main class="contenedor">
  <h1 class="titulo rojo">Campeonato</h1>

  <div class="tabla-wrap">
    <table class="tabla-actc">
      <thead>
        <tr>
          <th class="col-pos">Pos</th>
          <th class="col-num">N°</th>
          <th>Piloto</th>
          <th class="col-marca">Marca</th>
          <th class="col-puntos">Puntos</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Trae marca.nombre y marca.logo_url
        $sql = "
          SELECT p.id, p.nombre, p.numero, p.puntos,
                 m.nombre   AS marca_nombre,
                 m.logo_url AS marca_logo_url
          FROM pilotos p
          LEFT JOIN marcas m ON m.id = p.marca
          ORDER BY p.puntos DESC, p.numero ASC
        ";
        $res = $conn->query($sql);

        if ($res === false) {
          echo '<tr><td colspan="5">Error SQL: ' . htmlspecialchars($conn->error) . '</td></tr>';
        } elseif ($res->num_rows === 0) {
          $cnt = $conn->query('SELECT COUNT(*) AS c FROM pilotos');
          $total = ($cnt && $cnt->num_rows) ? (int)$cnt->fetch_assoc()['c'] : 0;
          echo $total > 0
            ? '<tr><td colspan="5">No hay filas para mostrar (revisá columnas).</td></tr>'
            : '<tr><td colspan="5">Sin pilotos cargados.</td></tr>';
        } else {
          $pos = 1;
          while ($row = $res->fetch_assoc()):
            $numero      = (int)$row['numero'];
            $puntos      = (int)$row['puntos'];
            $piloto      = htmlspecialchars($row['nombre'] ?? '', ENT_QUOTES, 'UTF-8');
            $marcaNombre = htmlspecialchars($row['marca_nombre'] ?? '—', ENT_QUOTES, 'UTF-8');

            // logo_url puede venir como ruta completa ('./Recursos/...') o solo archivo ('ford.png')
            $logoRaw  = trim((string)($row['marca_logo_url'] ?? ''));
            if ($logoRaw !== '' && (function_exists('str_starts_with') && (str_starts_with($logoRaw, './') || str_starts_with($logoRaw, '/')) || strpos($logoRaw, '/') !== false)) {
              $logoPath = $logoRaw;
            } else {
              $logoPath = ($logoRaw !== '') ? './Recursos/marcas/' . $logoRaw : '';
            }
        ?>
          <tr>
            <td class="pos-celda"><span><?= $pos ?></span></td>
            <td class="num"><?= $numero ?></td>
            <td class="piloto"><?= $piloto ?></td>
            <td class="marca">
              <?php if ($logoPath !== ''): ?>
                <img src="<?= htmlspecialchars($logoPath, ENT_QUOTES, 'UTF-8') ?>" alt="<?= $marcaNombre ?>">
              <?php else: ?>
                <?= $marcaNombre ?>
              <?php endif; ?>
            </td>
            <td class="puntos"><?= $puntos ?></td>
          </tr>
        <?php
            $pos++;
          endwhile;
        }
        ?>
      </tbody>
    </table>
  </div>
</main>

<footer class="pie">
  <div class="pie-contenedor">
    <div class="pie-logo"><img src="./Recursos/marcas/logoactc.png" alt="ACTC"></div>
    <div class="pie-links">
      <h3>TC</h3>
      <ul>
        <li><a href="./inicio.php">Inicio</a></li>
        <li><a href="./calendario.php">Calendario</a></li>
        <li><a href="./campeonato.php">Resultados</a></li>
        <li><a href="./registro.php">Registro</a></li>
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
