<?php
	// Lectura de JSON desde la API de Drupal
	// Código de desarrollo
	$miJsonURL = "http://www.isa.us.es/apps/api/members";
	// Código de despliegue
	//$miJsonURL = "http://localhost/apps/api/members";
	// Caché
	//$miJsonURL="members.json";
	$miJson = file_get_contents($miJsonURL);
	//print_r(json_decode($miJson));
	$miJsonDecode = json_decode($miJson);

	// Lectura desde el CSV de Google Drive
	include_once('lectorCSV.php');
    $arrayCSVMembers = array();
    $arrayCSVMembers = loadDataFromCSV("https://docs.google.com/spreadsheets/d/1-y5_vwyDSa3yJIdwy7O4R-l_CLK180WTsK_7gFt8EGw/pub?gid=0&single=true&output=csv");

	$miArrayPositions = array();
	
	$formerMembers = array();
	$technicalStaff = array();
	$externalsCollaborators = array();
	$mscStudents = array();
	$phdStudents = array();
	$reseachAssistants = array();
	$researchStaff = array();
	$head = array();
	$contador = 0;
	foreach ($miJsonDecode as $miJsonKey => $miJsonValue) {
		//print_r($miJsonDecode);
		//print_r($miJsonKey);
		$name = $miJsonValue->{'name'};
		$position = (string)$miJsonValue->{'position'};
		$surname = $miJsonValue->{'surname'};
		$office = $miJsonValue->{'office'};
		$telephone = $miJsonValue->{'telephone'};
		$email = $miJsonValue->{'email'};
		$web = $miJsonValue->{'web'};
		$memberID = $miJsonValue->{'memberID'};
		$tipoDeMiembro = tipoMiembro($memberID, $arrayCSVMembers);
		$urlFoto = enlaceAImagen($memberID, $arrayCSVMembers);
		$miPersonal = array();
		array_push($miPersonal, $name);
		array_push($miPersonal, $position);
		array_push($miPersonal, $surname);
		array_push($miPersonal, $office);
		array_push($miPersonal, $telephone);
		array_push($miPersonal, $email);
		array_push($miPersonal, $web);
		array_push($miPersonal, $urlFoto);
		//print_r($miPersonal);
		if(strcmp($tipoDeMiembro,"head") == 0)
		 	array_push($head, $miPersonal);	
		else if (strcmp($tipoDeMiembro,"research staff")==0)
		 	array_push($researchStaff, $miPersonal);
		 else if (strcmp($tipoDeMiembro,"research assistants")==0)
		 	array_push($reseachAssistants, $miPersonal);
		 else if (strcmp($tipoDeMiembro,"external collaborators") == 0)
		 	array_push($externalsCollaborators, $miPersonal);
		 else if (strcmp($tipoDeMiembro,"former member")==0)
		 	array_push($formerMembers, $miPersonal);
		 else if (strcmp($tipoDeMiembro,"technichal staff")==0)
		 	array_push($technicalStaff, $miPersonal);
		 else if (strcmp($tipoDeMiembro,"phd students")==0)
		 	array_push($phdStudents, $miPersonal);
		 else if (strcmp($tipoDeMiembro,"msc students")==0)
		 	array_push($mscStudents, $miPersonal);
		unset($miPersonal);
		

		/*if(!in_array($position, $miArrayPositions)){
			array_push($miArrayPositions, $position);
		}*/
		//echo $elemento;
	}
 //Creación del /all
	//echo $contador;
/*	$elemento = "";
    $elemento .= '<div class="col-xs-12 all">';
    $elemento .= '<div class="portfolio_single_content estilo-funding">';
    foreach ($miJsonDecode as $miJsonKey => $miJsonValue) {
		//print_r($miJsonDecode);
		//print_r($miJsonKey);
		$name = $miJsonValue->{'name'};
		$position = $miJsonValue->{'position'};
		$surname = $miJsonValue->{'surname'};
		$office = $miJsonValue->{'office'};
		$telephone = $miJsonValue->{'telephone'};
		$email = $miJsonValue->{'email'};
		$web = $miJsonValue->{'web'};
        $elemento .= '<ul>';
        $elemento .= '  <li>'.$name.' '.$surname.' '.$position.'</li>';
        $elemento .= '	<li>'.$office.', '.$telephone.', '.$email.', '.$web.'</li>';
        $elemento .= '</ul>';
    
    }
        $elemento .= ' </div>';
        $elemento .= '</div>';
        echo $elemento;
		*/
	$elemento = "";
    $elemento .= '<div class="col-xs-12 head">';
    $elemento .= '<div class="portfolio_single_content estilo-funding">';
    for ($i = 0; $i < sizeof($head); $i++) {

		$name = $head[$i][0];
		$position = $head[$i][1];
		$surname = $head[$i][2];
		$office = $head[$i][3];
		$telephone = $head[$i][4];
		$email = $head[$i][5];
		$web = $head[$i][6];
		$urlFoto = $head[$i][7];
		if($urlFoto != "") {
	        $elemento .= '<ul>';
	        $elemento .= '  <li><img src="'.$urlFoto.'""></img>';
	        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
	        $elemento .= '	<li>'.$office.', '.$telephone.', '.$email.', '.$web.'</li>';
	        $elemento .= '</ul>';
        }
        else{
        	$elemento .= '<ul>';
	        $elemento .= '  <li><img src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
	        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
	        $elemento .= '	<li>'.$office.', '.$telephone.', '.$email.', '.$web.'</li>';
	        $elemento .= '</ul>';
        }
    
    }
        $elemento .= ' </div>';
        $elemento .= '</div>';
        echo $elemento;
		$elemento = "";
    $elemento .= '<div class="col-xs-12 reseachstaff">';
    $elemento .= '<div class="portfolio_single_content estilo-funding">';
    for ($i = 0; $i < sizeof($researchStaff); $i++) {

		$name = $researchStaff[$i][0];
		$position = $researchStaff[$i][1];
		$surname = $researchStaff[$i][2];
		$office = $researchStaff[$i][3];
		$telephone = $researchStaff[$i][4];
		$email = $researchStaff[$i][5];
		$web = $researchStaff[$i][6];
        $elemento .= '<ul>';
        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
        $elemento .= '	<li>'.$office.', '.$telephone.', '.$email.', '.$web.'</li>';
        $elemento .= '</ul>';
    
    }
        $elemento .= ' </div>';
        $elemento .= '</div>';
        echo $elemento;
	
	//print_r($miArrayPositions);
	//print_r(sizeof($miArrayPositions));
	//
	function enlaceAImagen($id, $arrayCSVMembers) {
		$urlFoto = "";
		$encontrado = false;
		$i = 1;
		while($i < sizeof($arrayCSVMembers) && !$encontrado){
			if($arrayCSVMembers[$i][0]==$id) {
				$urlFoto = $arrayCSVMembers[$i][1];
				$encontrado = true;
			}
			else {
				$i++;
			}

		}
		return $urlFoto;
	}

	function tipoMiembro($id, $arrayCSVMembers) {
		$tipo = "";
		$encontrado = false;
		$i = 1;
		while($i < sizeof($arrayCSVMembers) && !$encontrado){
			if($arrayCSVMembers[$i][0]==$id) {
				$tipo = $arrayCSVMembers[$i][2];
				$encontrado = true;
			}
			else {
				$i++;
			}

		}
		return $tipo;
	}
?>