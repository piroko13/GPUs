<?php
session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include "autentificacion.php";
if (isset($_SESSION["usuario_valido"]) && !$_SESSION["usuario_valido"]) {
  header('Location: index.php');
}
$consulta = consulta();

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  </head>

  <body class="text-center">
    <div class="btn-group" role="group" aria-label="Basic example">
      <a href="alta.php" class="btn btn-success">Añadir Registro</a>
      <a href="exportar.php" class="btn btn-info">Exportar en CSV</a>
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
    <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>-->
  </tbody>
</table>
  </body>
</html>
