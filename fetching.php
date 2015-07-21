<?php
	if(strcmp($_POST['password'], "isa-data")!=0)
		header("Location:error.php");
	else
	{
		// Generación de miembros
		$miJsonURL = "http://www.isa.us.es/apps/api/members";
		$miJson = file_get_contents($miJsonURL);
		$members = 'members.json';
		file_put_contents($members, $miJson);
		// Generación de fundings
		$miJsonURL = "http://www.isa.us.es/apps/api/projects";
		$miJson = file_get_contents($miJsonURL);
		$fundings = 'fundings.json';
		file_put_contents($fundings, $miJson);
		// Generación de publications
		$miurl="http://www.isa.us.es/apps/api/publications";
		$mijson = file_get_contents($miurl);
		$publications = 'publications.json';
		file_put_contents($publications, $mijson);
		$mensaje = "";
		$mensaje .= "Escritos 3 ficheros:<br/>";
		$mensaje .= '<a href="publications.json">publications.json</a><br/>';
		$mensaje .= '<a href="members.json">members.json</a><br/>';
		$mensaje .= '<a href="fundings.json">fundings.json</a><br/>';
		echo $mensaje;
	}
?>