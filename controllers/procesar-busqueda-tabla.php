<?php
/*--------------------------------------------------*/
/* procesar-busqueda-tabla.php -                    */
/* Una vez que se busque por categoría, este script */
/* mostrará el detalle de la información de la      */
/* marca seleccionada                               */
/*--------------------------------------------------*/
/* Autor: Luis Martín Vázquez (DEVMXV)              */
/*--------------------------------------------------*/
/* Creación: Abril 2019                             */
/*--------------------------------------------------*/

require_once '../includes/init.php';


$database = new Database();

$db = $database->connect();

$marca = new Marca($db);


$errors = array();
$data = array();

//---obtener ID de la marca desde URL
$marca->id_marca = $_GET['id'];

//---método de búsqueda por tabla
$resultado_marca = $marca->busqueda_marca_tabla();
if($resultado_marca){
	$detalle = $resultado_marca->fetch(PDO::FETCH_ASSOC);
	//---extract para obtener de arreglo de FETCH_ASSOC los valores
	//---encontrados
	extract($detalle);
	$data['nombre'] = $nombre;
	$data['stand'] = $stand;
	$data['direccion'] = $direccion;
	$data['telefono'] = $telefono;
	$data['contacto'] = $contacto;
	$data['categoria'] = $categoria;
	$data['logo'] = $logo;
	$data['ruta'] = $rutaImg;

	$data['success'] = true;
	$data['message'] = 'marca';
} else {
	$data['success'] = false;
	$data['message'] = 'Sin resultados';
}

echo json_encode($data);

?>