<?php

class Expositor {
	private $conn;
	private $tabla = "expositor";

	//---propiedades, generalmente llamadas de BD
	public $id_expositor;
	public $marca;
	public $descripcion;
	public $stand;
	public $direccion;
	public $telefono;
	public $contacto;
	public $web;
	public $rutaImg;

	//---métodos

	public function __construct($db){
		$this->conn = $db;
	}

}



?>