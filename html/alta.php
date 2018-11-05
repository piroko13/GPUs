<?php
session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include "autentificacion.php";
if (isset($_SESSION["usuario_valido"]) && !$_SESSION["usuario_valido"]) {
  header('Location: index.php');
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alta</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  </head>

  <body>

<form class="col-3" method="get" action="insert.php">
  <div class="form-group">
    <label for="Modelo">Modelo</label>
    <input type="text" class="form-control" name="Modelo" id="Modelo" placeholder="Ingresa el modelo">
  </div>
  <div class="form-group">
    <label for="Procesador_grafico">Procesador Gráfico</label>
    <input type="text" class="form-control" name="Procesador_grafico" id="Procesador_grafico" placeholder="Ingresa el tipo de procesador gráfico">
  </div>
  <div class="form-group">
    <label for="Numero_ventiladores">Número de Ventiladores</label>
    <input type="number" min="1" max="3" class="form-control" name="Numero_ventiladores" id="Numero_ventiladores" placeholder="Ingresa el número de ventiladores">
  </div>
  <div class="form-group">
    <label for="Cores">Número de Cores</label>
    <input type="number" min="1" class="form-control" name="Cores" id="Cores" placeholder="Ingresa el número de cores">
  </div>
  <div class="form-group">
    <label for="Tipo_memoria">Tipo de Memoria</label>
    <input type="text" class="form-control" name="Tipo_memoria" id="Tipo_memoria" placeholder="Ingresa el tipo de memoria">
  </div>
  <div class="form-group">
    <label for="Marca_idMarca">Marca</label>
    <select class="form-control" name="Marca_idMarca" id="Marca_idMarca">
      <option value="1">Nvidia</option>
      <option value="2">AMD</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </body>
</html>
