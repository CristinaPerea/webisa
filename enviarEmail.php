<?php
	$para = 'aruiz@us.es';
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$asunto = $_POST['asunto'];
	$mensaje = $_POST['mensaje'];
	$cabeceras = 'From: '.$nombre.' ('.$email.')' "\r\n";
?>
