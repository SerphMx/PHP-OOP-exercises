<?php
/*----------------------------------------------*/
/* consulta-cat.php : Controlador para poder    */
/* consultar las categorías disponibles de la   */
/* información dentro de BD                     */
/*----------------------------------------------*/
/* Creación: Luis Martín Vázquez                */
/*----------------------------------------------*/
/* Abril 2019                                   */
/*----------------------------------------------*/


//---inicializar    
require_once '../includes/init.php';


//---instanciar clases
$database = new Database();

$db = $database->connect();

$marca = new Marca($db);

//---método para poder hacer la consulta de categoría
$marca->opciones_categoria();




?>