<?php
session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include "autentificacion.php";
if (isset($_SESSION["usuario_valido"]) && !$_SESSION["usuario_valido"]) {
  header('Location: index.php');
}
$servername = "localhost";
$username = "GPUs";
$password = "Gpus1234";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `mydb`.`Tarjetas_de_Video`
(`Modelo`,
`Procesador_grafico`,
`Numero_ventiladores`,
`Cores`,
`Tipo_memoria`,
`Marca_idMarca`)
VALUES
('".$_GET["Modelo"]."',
'".$_GET["Procesador_grafico"]."',
".$_GET["Numero_ventiladores"].",
".$_GET["Cores"].",
'".$_GET["Tipo_memoria"]."',
'".$_GET["Marca_idMarca"]."')";

if ($conn->query($sql) === TRUE) {
    header('Location: dashboard.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
