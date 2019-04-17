<?php
//-------------------------------------------------------------
// procesar_busqueda - Código para hacer la búsqueda asíncrona
//-------------------------------------------------------------
// Creación: Luis Martín Vázquez       
//-------------------------------------------------------------
// Fecha: Abril 2019
//-------------------------------------------------------------

require_once '../includes/init.php';

$database = new Database();

$db = $database->connect();

$marca = new Marca($db);


//---arreglos que guardan datos
$errors = array();
$data = array();
$dataset = array();

//--búsqueda por ambos campos de opción
if(isset($_POST['tipo']) && isset($_POST['expositor'])){
	$marca->tipo = $_POST['tipo'];
	// $marca->categoria = $_POST['tipo'];
	$marca->nombre = $_POST['expositor'];
	$resultado_marca = $marca->busqueda_marca();
	if($resultado_marca){
		$detalle = $resultado_marca->fetch(PDO::FETCH_ASSOC);
		$data['nombre'] = $detalle['nombre'];
		$data['categoria'] = $detalle['categoria'];
		$data['stand'] = $detalle['stand'];
		$data['direccion'] = $detalle['direccion'];
		$data['telefono'] = $detalle['telefono'];
		$data['contacto'] = $detalle['contacto'];
		$data['logo'] = $detalle['logo'];
		$data['ruta'] = $detalle['rutaImg'];

		$data['success'] = true;
		$data['message'] = 'marca';
	} else {
		$data['success'] = false;
		$data['message'] = 'Sin resultados';
	}

	echo json_encode($data);
}
	//---busqueda por categoría
	elseif (isset($_POST['categoria'])){
		$marca->categoria = $_POST['categoria'];
	 	$categoria = $marca->busqueda_por_cat();

	 	while($row = $categoria->fetch(PDO::FETCH_ASSOC)){
	 		$dataset [] = "<tr><td id='valor-exp' class='txt-tabla' onclick = 'busquedaTabla(".$row['idmarca'].")'>".$row['nombre']."</td></tr>";
	 	}

	 	$data['success'] = true;
	 	$data['output'] = $dataset;
	 	$data['message'] = 'lista';

	 	echo json_encode($data);
 } else {

 	$marca->rango = $_POST['alfabetico'];
 	$busqueda_alfabetico = $marca->busqueda_alfabeto();

 	while($row = $busqueda_alfabetico->fetch(PDO::FETCH_ASSOC)){
 			$dataset [] = "<tr><td id='valor-exp-".$row['idmarca']."' class='txt-tabla' onclick = 'busquedaTabla(".$row['idmarca'].")'>".$row['nombre']."</td></tr>";
 		}

 	$data['success'] = true;
 	$data['output'] = $dataset;
 	$data['message'] = 'lista';

 	//---regresar todos los datos
 	echo json_encode($data);

 }

?>