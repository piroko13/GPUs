<?php
session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include "autentificacion.php";
if (isset($_SESSION["usuario_valido"]) && !$_SESSION["usuario_valido"]) {
  header('Location: index.php');
}

include_once "autentificacion.php";
$conn = conexion();

$sql = "DELETE FROM `mydb`.`Tarjetas_de_Video`
WHERE id_Tarjetas_de_Video = ".$_GET["ID"].";";
if ($conn->query($sql) === TRUE) {
    $conn->close();
    header('Location: dashboard.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
