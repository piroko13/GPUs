<?php
session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include "autentificacion.php";
if (isset($_SESSION["usuario_valido"]) && !$_SESSION["usuario_valido"]) {
  header('Location: index.php');
}
$graficar = graficar();

?>
<html lang="en">
<head>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>

<body>
  <div id="container" style="height: 400px"></div>
</body>

<script>
Highcharts.chart('container', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    text: 'Total de Ventiladores por GPU'
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      depth: 35,
      dataLabels: {
        enabled: true,
        format: '{point.name}'
      }
    }
  },
  series: [{
    type: 'pie',
    name: 'Número de ventiladores',
    data: [
      <?php
        while ($fila = $graficar->fetch_assoc()) {
          echo "['".$fila["Numero_ventiladores"]."', ".$fila["total"]."],";
        }
      ?>
    ]
  }]
});

</script>

</html>
