<?php
		// Generación de miembros
		//$miJsonURL = "http://www.isa.us.es/apps/api/members/";
		$miJsonURL = "http://localhost/apps/api/members/";
		$miJson = file_get_contents($miJsonURL);
		$members = 'members.json';
		$bytes_escritos_members = file_put_contents($members, $miJson);
		// Generación de fundings
		//$miJsonURL = "http://www.isa.us.es/apps/api/projects/";
		$miJsonURL = "http://localhost/apps/api/projects/";
		$miJson = file_get_contents($miJsonURL);
		$fundings = 'fundings.json';
		$bytes_escritos_fundings = file_put_contents($fundings, $miJson);
		// Generación de publications
		//$miurl="http://www.isa.us.es/apps/api/publications/";
		$miurl="http://localhost/apps/api/publications/";
		$miJson = file_get_contents($miurl);
		$publications = 'publications.json';
		$bytes_escritos_publications = file_put_contents($publications, $miJson);
		// Generación de publications
		$miurl="https://docs.google.com/spreadsheets/d/1ysrUC9ls0ElV39V1IXXseWubjoQxwC4-uneFRustaKM/pub?gid=0&single=true&output=csv";
		$miJson = file_get_contents($miurl);
		$tools = 'tools/tools.csv';
		$bytes_escritos_tools = file_put_contents($tools, $miJson);
		// Generación de collaborations
		$miurl = "https://docs.google.com/spreadsheets/d/1DqBiUjIaL0nyPQ89VWP5pt3uqxrszaobeMfD_LyK3qM/pub?output=csv";
		$miJson = file_get_contents($miurl);
		$collaborations = 'collaborations/collaborationsCSV.csv';
		$bytes_escritos_collaborations = file_put_contents($collaborations, $miJson);
		// Research Lines
		$miurl = "https://docs.google.com/spreadsheets/d/171m6bh9V3-NfkqB3V49laxFHEYrwD28jZX36egZnTtM/pub?output=csv";
		$miJson = file_get_contents($miurl);
		$researchLines = 'researchLines/researchLines.csv';
		$bytes_escritos_researchLines = file_put_contents($researchLines, $miJson);

		// Members.CSV
		$miurl = "https://docs.google.com/spreadsheets/d/1-y5_vwyDSa3yJIdwy7O4R-l_CLK180WTsK_7gFt8EGw/pub?gid=0&single=true&output=csv";
		$miJson = file_get_contents($miurl);
		$membersCSV = 'members/members.csv';
		$bytes_escritos_membersCSV = file_put_contents($membersCSV, $miJson);

		$mensaje = "";
		$mensaje .= "Escritos 6 ficheros:<br/>";
		$mensaje .= '<a href="publications.json">publications.json</a> con '.$bytes_escritos_publications.' bytes escritos<br/>';
		$mensaje .= '<a href="members.json">members.json</a> con '.$bytes_escritos_members.' bytes escritos<br/>';
		$mensaje .= '<a href="fundings.json">fundings.json</a> con '.$bytes_escritos_fundings.' bytes escritos<br/>';
		$mensaje .= '<a href="tools.csv">tools.csv</a> con '.$bytes_escritos_tools.' bytes escritos<br/>';
		$mensaje .= '<a href="collaborations/collaborationsCSV.csv">collaborationsCSV.csv</a> con '.$bytes_escritos_collaborations.' bytes escritos<br/>';
		$mensaje .= '<a href="researchLines/researchLines.csv">researchLinesCSV.csv</a> con '.$bytes_escritos_researchLines.' bytes escritos<br/>';
		$mensaje .= '<a href="members/members.csv">members.csv</a> con '.$bytes_escritos_membersCSV.' bytes escritos<br/>';
		if($miJson)
			echo $mensaje;
		else
			echo "No se puede leer de las APIs";
?>