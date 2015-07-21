<?php
		// Generación de miembros
		$miJsonURL = "http://localhost/apps/api/members/";
		$miJson = file_get_contents($miJsonURL);
		$members = 'members.json';
		$bytes_escritos_members = file_put_contents($members, $miJson);
		// Generación de fundings
		$miJsonURL = "http://localhost/apps/api/projects/";
		$miJson = file_get_contents($miJsonURL);
		$fundings = 'fundings.json';
		$bytes_escritos_fundings = file_put_contents($fundings, $miJson);
		// Generación de publications
		$miurl="http://localhost/apps/api/publications/";
		$miJson = file_get_contents($miurl);
		$publications = 'publications.json';
		$bytes_escritos_publications = file_put_contents($publications, $miJson);
		$mensaje = "";
		$mensaje .= "Escritos 3 ficheros:<br/>";
		$mensaje .= '<a href="publications.json">publications.json</a> con '.$bytes_escritos_publications.' bytes escritos<br/>';
		$mensaje .= '<a href="members.json">members.json</a> con '.$bytes_escritos_members.' bytes escritos<br/>';
		$mensaje .= '<a href="fundings.json">fundings.json</a> con '.$bytes_escritos_fundings.' bytes escritos<br/>';
		if($miJson)
			echo $mensaje;
		else
			echo "No se puede leer de las APIs";
?>