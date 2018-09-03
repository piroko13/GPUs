<h1>GPUs</h1>

<form  action="insert.php" method="get">
 Modelo<br>
 <input type="text" name="Modelo"><br>
 Procesador gráfico<br>
 <input type="text" name="Procesador_grafico"><br>
 Número de ventiladores<br>
 <input type="number" name="Numero_ventiladores"><br>
 Cores<br>
 <input type="number" name="Cores"><br>
 Tipo de memoria<br>
 <input type="text" name="Tipo_memoria"><br>
 Marca<br>
 <select name="Marca_idMarca">
   <option value="1">Nvidia</option>
   <option value="2">AMD</option>
</select><br>
<input type="submit" value="Submit">
</form>

<?php
?>
