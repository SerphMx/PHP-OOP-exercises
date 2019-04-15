<?php

class Marca {
	private $conn;
	private $tabla = "marca";

	public $id_marca;
	public $nombre;

	public function __construct($db){
		$this->conn = $db;

	}


	//---opciones_busqueda() - Método para poder seleccionar el tipo de marca
	//---por el que se quiere buscar
	public function opciones_busqueda(){
		$query = "SELECT * FROM " . $this->tabla . " ORDER BY nombre ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		// $row = $stmt->fetch(PDO::FETCH_ASSOC);
		// $this->nombre = $row['nombre'];

		// echo $query;

		// echo $query;

		// $cuenta = $stmt->rowCount();
		// echo $cuenta;
		return $stmt;

		
	}

	public function mensaje(){
		echo "Hola men";
	}
}





?>