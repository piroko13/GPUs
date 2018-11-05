<?php
session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include "autentificacion.php";
if (isset($_SESSION["usuario_valido"]) && !$_SESSION["usuario_valido"]) {
  header('Location: index.php');
}

include_once "autentificacion.php";

// output headers so that the file is downloaded rather than displayed
header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="GPUs.csv"');

// do not cache the file
header('Pragma: no-cache');
header('Expires: 0');

// create a file pointer connected to the output stream
$file = fopen('php://output', 'w');

// send the column headers
fputcsv($file, array('ID', 'Modelo', 'Procesador Gráfico', 'Número de Ventiladores', 'Cores', 'Tipo de Memoria','Marca'));

// Sample data. This can be fetched from mysql too
$data = exportar();

// output each row of the data
foreach ($data as $row)
{
fputcsv($file, $row);
}

exit();
?>
