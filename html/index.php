<?php
session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include "autentificacion.php";
if (isset($_SESSION["usuario_valido"]) && $_SESSION["usuario_valido"]) {
  header('Location: dashboard.php');
}
elseif (isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])) {
  if (validacion_Usuario($_POST["inputEmail"],$_POST["inputPassword"])) {
    header('Location: dashboard.php');
  }
  //var_dump($_SESSION);
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST">
      <img class="mb-4" src="logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Ingresa tus datos</h1>
      <?php if((isset($_SESSION["usuario_valido"]) && !$_SESSION["usuario_valido"])) : ?><small>Usuario Inválido</small> <?php endif; ?>
      <label for="inputEmail" class="sr-only">Dirección de Correo</label>
      <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Dirección de Correo" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-dark btn-block" type="submit">Login</button>
    </form>
  </body>
</html>
