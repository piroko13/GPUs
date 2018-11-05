<?php
session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include "autentificacion.php";
if (isset($_SESSION["usuario_valido"]) && !$_SESSION["usuario_valido"]) {
  header('Location: index.php');
}
$consulta = consulta();
$graficar = graficar();

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  </head>

  <body class="text-center">
    <div class="btn-group" role="group" aria-label="Basic example">
      <a href="alta.php" class="btn btn-success">Añadir Registro</a>
      <a href="exportar.php" class="btn btn-info">Exportar en CSV</a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ImportarCSV">Importar CSV</button>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Modelo</th>
      <th scope="col">Procesador Gráfico</th>
      <th scope="col">Número de Ventiladores</th>
      <th scope="col">Cores</th>
      <th scope="col">Tipo de Memoria</th>
      <th scope="col">Marca</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
    <?php
      while ($fila = $consulta->fetch_assoc()) {
        echo "<tr>";
        echo "<th>".$fila["id_Tarjetas_de_Video"]."</th>";
        echo "<td>".$fila["Modelo"]."</td>";
        echo "<td>".$fila["Procesador_grafico"]."</td>";
        echo "<td>".$fila["Numero_ventiladores"]."</td>";
        echo "<td>".$fila["Cores"]."</td>";
        echo "<td>".$fila["Tipo_memoria"]."</td>";
        echo "<td>".$fila["nombre_marca"]."</td>";
        echo "<td>".'<a href="eliminar.php?ID='.$fila["id_Tarjetas_de_Video"].'" class="btn btn-danger">Eliminar Registro</a>'."</td>";
        echo "</tr>";
      }
    ?>
  </tbody>
</table>

<div id="container" style="height: 400px"></div>

<div id="ImportarCSV" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Archivo a Importar</h5>
      </div>
      <div class="modal-body">
        <form id="importarForm" action='importar.php' method='POST' enctype='multipart/form-data'>
		  <div class="form-group">
			<input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="importar" type="button" class="btn btn-primary">Importar</button>
      </div>
    </div>
  </div>
</div>
  </body>
  <script>
	$("#importar").click(function(){$("#importarForm").submit()});
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
