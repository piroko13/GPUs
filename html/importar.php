<?php
	include_once("autentificacion.php");

	$info = pathinfo($_FILES['file']['name']);
	$ext = $info['extension']; // get the extension of the file
	$newname = "import.".$ext;

	$target = 'import/'.$newname;
	move_uploaded_file( $_FILES['file']['tmp_name'], $target);

	$conn = conexion();

  $row = 1;
	if (($handle = fopen($target, "r")) !== FALSE) {
	  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);

		$sql = "INSERT INTO `GPUs`.`Tarjetas_de_Video`
    (`Modelo`,
    `Procesador_grafico`,
    `Numero_ventiladores`,
    `Cores`,
    `Tipo_memoria`,
    `Marca_idMarca`)
    VALUES
    ('".$data[0]."',
    '".$data[1]."',
    '".$data[2]."',
    '".$data[3]."',
    '".$data[4]."',
    '".$data[5]."')";

		if ($conn->query($sql) === TRUE) {
			echo "<p> $num fields in line $row: <br /></p>\n";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$row++;
	  }
	  fclose($handle);
	}
?>
