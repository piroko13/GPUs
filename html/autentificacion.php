<?php
function conexion (){
  $servername = "localhost";
  $username = "GPUs";
  $password = "Gpus1234";
  $dbname = "GPUs";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}
function desconexion (mysqli $conn){
  $conn->close();
}
function validacion_Usuario (string $correo, string $password){
  $conn = conexion();
  $sql = "SELECT `usuarios`.`idusuarios`,
    `usuarios`.`correo`,
    `usuarios`.`password`
FROM `GPUs`.`usuarios`
WHERE `usuarios`.`correo` = '".$correo."' AND `usuarios`.`password` = '".md5($password)."';";
$conn->query($sql);
$result = $conn->query($sql);
desconexion($conn);
if ($result->num_rows == 1) {
  $_SESSION["usuario_valido"] = TRUE;
  return TRUE;
}
else {
  $_SESSION["usuario_valido"] = FALSE;
  return FALSE;
}
}
function consulta (){
  $conn = conexion();
  $sql = "SELECT * FROM .Tarjetas_de_Video LEFT JOIN GPUs.Marca ON GPUs.Tarjetas_de_Video.Marca_idMarca = GPUs.Marca.idMarca;";
$conn->query($sql);
$result = $conn->query($sql);
desconexion($conn);
return $result;
}
function exportar (){
  $result = consulta();
  $data = array();
  while ($fila = $result->fetch_assoc()) {
    $row_data = array($fila["id_Tarjetas_de_Video"],$fila["Modelo"],$fila["Procesador_grafico"],$fila["Numero_ventiladores"],$fila["Cores"],$fila["Tipo_memoria"],$fila["nombre_marca"]);
    array_push($data, $row_data);
  } return $data;
}
function graficar (){
  $conn = conexion();
  $sql = "SELECT `Tarjetas_de_Video`.`Numero_ventiladores`, count(id_Tarjetas_de_Video) as total FROM `GPUs`.`Tarjetas_de_Video` group by Tarjetas_de_Video.Numero_ventiladores;";
$conn->query($sql);
$result = $conn->query($sql);
desconexion($conn);
return $result;
}
?>
