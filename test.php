<?php

require_once 'includes/Database.php';
require_once 'includes/Expositor.php';
require_once 'includes/Marca.php';


$database = new Database();

$db = $database->connect();


$expositor = new Expositor($db);

$marca = new Marca($db);

$opciones = $marca->opciones_busqueda();

// $mensaje = $marca->mensaje();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<select>
		<option>Select Category...</option>
		<?php
			while($detalle = $opciones->fetch(PDO::FETCH_ASSOC)){
				extract($detalle);
				echo "<option value='{$idmarca}'>{$nombre}</option>";
			}
		?>
	</select>
</body>
</html>