<?php
/*--------------------------------------------------*/
/* opciones-marca.php() - Script para poder         */
/* mostrar por autocompletar las marcas             */
/*--------------------------------------------------*/
/* Creación: Luis Martín Vázquez                    */
/*--------------------------------------------------*/
/* Abril 2019                                       */
/*--------------------------------------------------*/

require_once 'includes/init.php';

$database = new Database();

$db = $database->connect();

$marca = new Marca($db);

$opciones = $marca->opciones_busqueda();

//---mostrar las marcas encontradas en BD
echo $opciones;





?>