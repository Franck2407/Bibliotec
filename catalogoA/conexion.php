<?php
	
	$mysqli = new mysqli('localhost', 'root', 'ico1', 'Prueba1');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>