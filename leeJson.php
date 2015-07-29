<?php
	// Lectura de JSON desde la API de Drupal
	// Código de desarrollo
	//$miJsonURL = "http://www.isa.us.es/apps/api/members";
	// Código de despliegue
	//$miJsonURL = "http://localhost/apps/api/members";
	// Caché
	$miJsonURL="members.json";
	$miJson = file_get_contents($miJsonURL);
	//print_r(json_decode($miJson));
	$miJsonDecode = json_decode($miJson);

	// Lectura desde el CSV de Google Drive
	include_once('lectorCSV.php');
    $arrayCSVMembers = array();
    //$arrayCSVMembers = loadDataFromCSV("https://docs.google.com/spreadsheets/d/1-y5_vwyDSa3yJIdwy7O4R-l_CLK180WTsK_7gFt8EGw/pub?gid=0&single=true&output=csv");
    $arrayCSVMembers = loadDataFromCSV("members/members.csv");
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
		if(strlen($office) > 10)
			$office = substr($office,0, 9).'...';
		$telephone = $miJsonValue->{'telephone'};
		$email = $miJsonValue->{'email'};
		$web = $miJsonValue->{'web'};
		$memberID = $miJsonValue->{'memberID'};
		$tipoDeMiembro = tipoMiembro($memberID, $arrayCSVMembers);
		$urlFoto = enlaceAImagen($memberID, $arrayCSVMembers);
		$webCSV = enlaceADefaultWeb($memberID, $arrayCSVMembers);
		if($webCSV != "")
			$web = $webCSV;
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
		 else if (strcmp($tipoDeMiembro,"former members")==0)
		 	array_push($formerMembers, $miPersonal);
		 else if (strcmp($tipoDeMiembro,"technical staff")==0)
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
    $elemento .= '<div class="portfolio_single_content estilo-members">';
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
	
	$numTotal = sizeof($head);
	$resto = $numTotal % 3;
	$elemento = "";
    $elemento .= '<div class="col-xs-12 head antiguo">';
    //$elemento .= '<div class="portfolio_single_content estilo-members">';
    $elemento .= '<div class="container"><div class="devider"></div><h4 class="text-center">HEAD</h4></div>';
    $elemento .= '<div class="estilo-members ">';
    for ($i = 0; $i < sizeof($head); $i++) {

		$name = $head[$i][0];
		$position = $head[$i][1];
		$surname = $head[$i][2];
		$office = $head[$i][3];
		$telephone = $head[$i][4];
		$email = $head[$i][5];
		$web = $head[$i][6];
		$urlFoto = $head[$i][7];
  		$elementoLocal = creaElemento($i, $numTotal, $resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web);
  		$elemento .= $elementoLocal;
		/*if($i < $numTotal - $resto){
			if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	        else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	    }
	    else {
	    	if($resto == 2) {
		    	if($urlFoto != "") {
			        $elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        else{
		        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6 quedaUnoHead">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	       		}
	       		else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaUnoHead">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        	}
	    	}
	    }*/
    
    }
    
    $elemento .= ' </div>';
    $elemento .= '</div>';
    echo $elemento;

    // Research staff
    $numTotal = sizeof($researchStaff);
	$resto = $numTotal % 3;
	$elemento = "";
    $elemento .= '<div class="col-xs-12 reseachstaff">';
    $elemento .= '<div class="container"><div class="devider"></div><h4 class="text-center">RESEARCH STAFF</h4></div>';
    $elemento .= '<div class="estilo-members ">';
    for ($i = 0; $i < sizeof($researchStaff); $i++) {

		$name = $researchStaff[$i][0];
		$position = $researchStaff[$i][1];
		$surname = $researchStaff[$i][2];
		$office = $researchStaff[$i][3];
		$telephone = $researchStaff[$i][4];
		$email = $researchStaff[$i][5];
		$web = $researchStaff[$i][6];
		$urlFoto = $researchStaff[$i][7];
		$elementoLocal = creaElemento($i, $numTotal, $resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web);
  		$elemento .= $elementoLocal;
		/*if($i < $numTotal - $resto){
			if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	        else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	    }
    	else {
	    	if($resto == 2) {
		    		if($urlFoto != "") {
			        $elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        else{
		        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	       		}
	       		else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        	}
	    	}
		}*/
    }
    
    $elemento .= ' </div>';
    $elemento .= '</div>';
    echo $elemento;

    // Research assistants
    $numTotal = sizeof($reseachAssistants);
	$resto = $numTotal % 3;
	$elemento = "";
    $elemento .= '<div class="col-xs-12 researchassistants">';
    $elemento .= '<div class="container"><div class="devider"></div><h4 class="text-center">RESEARCH ASSISTANTS</h4></div>';
    $elemento .= '<div class="estilo-members">';
    $contadorResto =2 ;
    for ($i = 0; $i < sizeof($reseachAssistants); $i++) {

		$name = $reseachAssistants[$i][0];
		$position = $reseachAssistants[$i][1];
		$surname = $reseachAssistants[$i][2];
		$office = $reseachAssistants[$i][3];
		$telephone = $reseachAssistants[$i][4];
		$email = $reseachAssistants[$i][5];
		$web = $reseachAssistants[$i][6];
		$urlFoto = $reseachAssistants[$i][7];
		$elementoLocal = creaElemento($i, $numTotal, $resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web);
  		$elemento .= $elementoLocal;
		/*if($i < $numTotal - $resto){
				if($urlFoto != "") {
		        $elemento .= '<ul class=" col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	        else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		       $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	    }
    	else {
	    	if($resto == 2) {
		    	if($urlFoto != "") {
			        $elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        else{
		        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	       		}
	       		else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        	}
	    	}
	    }*/
    }

    $elemento .= ' </div>';
    $elemento .= '</div>';
    echo $elemento;

    // External collaborators
    $numTotal = sizeof($externalsCollaborators);
	$resto = $numTotal % 3;
    $elemento = "";
    $elemento .= '<div class="col-xs-12 externalcollaborators">';
    //$elemento .= '<div class="portfolio_single_content estilo-members">';
    $elemento .= '<div class="container"><div class="devider"></div><h4 class="text-center">EXTERNAL COLLABORATORS</h4></div>';
    $elemento .= '<div class="estilo-members ">';
    for ($i = 0; $i < sizeof($externalsCollaborators); $i++) {

		$name = $externalsCollaborators[$i][0];
		$position = $externalsCollaborators[$i][1];
		$surname = $externalsCollaborators[$i][2];
		$office = $externalsCollaborators[$i][3];
		$telephone = $externalsCollaborators[$i][4];
		$email = $externalsCollaborators[$i][5];
		$web = $externalsCollaborators[$i][6];
		$urlFoto = $externalsCollaborators[$i][7];
		$elementoLocal = creaElemento($i, $numTotal, $resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web);
  		$elemento .= $elementoLocal;
  		/*
		if($i < $numTotal - $resto){
			if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	        else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	 	}else {
	    	if($resto == 2) {
		    	if($urlFoto != "") {
			        $elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        else{
		        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	       		}
	       		else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        	}
	    	}
	    }   */
    }
    
    $elemento .= ' </div>';
    $elemento .= '</div>';
    echo $elemento;

    //Technical staff
    $numTotal = sizeof($technicalStaff);
	$resto = $numTotal % 3;
    $elemento = "";
    $elemento .= '<div class="col-xs-12 technicalstaff">';
    //$elemento .= '<div class="portfolio_single_content estilo-members">';
    $elemento .= '<div class="container"><div class="devider"></div><h4 class="text-center">TECHNICAL STAFF</h4></div>';
    $elemento .= '<div class="estilo-members ">';
    for ($i = 0; $i < sizeof($technicalStaff); $i++) {

		$name = $technicalStaff[$i][0];
		$position = $technicalStaff[$i][1];
		$surname = $technicalStaff[$i][2];
		$office = $technicalStaff[$i][3];
		$telephone = $technicalStaff[$i][4];
		$email = $technicalStaff[$i][5];
		$web = $technicalStaff[$i][6];
		$urlFoto = $technicalStaff[$i][7];
		$contadorResto = 2;
		$elementoLocal = creaElemento($i, $numTotal, $resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web);
  		$elemento .= $elementoLocal;
  		/*
		if($i < $numTotal - $resto){
			if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	        else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
    	}else {
	    	if($resto == 2) {
		    	if($urlFoto != "") {
			        $elemento .= '<ul class="col-md-4 col-sm-6">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        else{
		        	$elemento .= '<ul class="col-md-4 col-sm-6">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	       		}
	       		else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        	}
	    	}
	    }*/
    }
    
    $elemento .= ' </div>';
    $elemento .= '</div>';
    echo $elemento;



    // PhD Students
    $numTotal = sizeof($phdStudents);
	$resto = $numTotal % 3;
    $elemento = "";
    $elemento .= '<div class="col-xs-12 phdstudents">';
    //$elemento .= '<div class="portfolio_single_content estilo-members">';
    $elemento .= '<div class="container"><div class="devider"></div><h4 class="text-center">PHD STUDENTS</h4></div>';
    $elemento .= '<div class="estilo-members ">';
    for ($i = 0; $i < sizeof($phdStudents); $i++) {

		$name = $phdStudents[$i][0];
		$position = $phdStudents[$i][1];
		$surname = $phdStudents[$i][2];
		$office = $phdStudents[$i][3];

		$telephone = $phdStudents[$i][4];
		$email = $phdStudents[$i][5];
		$web = $phdStudents[$i][6];
		$urlFoto = $phdStudents[$i][7];
		$elementoLocal = creaElemento($i, $numTotal, $resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web);
  		$elemento .= $elementoLocal;/*
		if($i < $numTotal - $resto){
			if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	        else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
    	}    else {
	    	if($resto == 2) {
		    	if($urlFoto != "") {
			        $elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        else{
		        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	       		}
	       		else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        	}
	    	}
	    }*/
    }
    
    $elemento .= ' </div>';
    $elemento .= '</div>';
    echo $elemento;

    // Msc Students
    $numTotal = sizeof($mscStudents);
	$resto = $numTotal % 3;
    $elemento = "";
    $elemento .= '<div class="col-xs-12 mscstudents">';
    //$elemento .= '<div class="portfolio_single_content estilo-members">';
    $elemento .= '<div class="container"><div class="devider"></div><h4 class="text-center">MSC STUDENTS</h4></div>';
    $elemento .= '<div class="estilo-members ">';
    for ($i = 0; $i < sizeof($mscStudents); $i++) {

		$name = $mscStudents[$i][0];
		$position = $mscStudents[$i][1];
		$surname = $mscStudents[$i][2];
		$office = $mscStudents[$i][3];

		$telephone = $mscStudents[$i][4];
		$email = $mscStudents[$i][5];
		$web = $mscStudents[$i][6];
		$urlFoto = $mscStudents[$i][7];
		$elementoLocal = creaElemento($i, $numTotal, $resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web);
  		$elemento .= $elementoLocal;/*
		if($i < $numTotal - $resto){
			if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	        else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
      		}
    	}    else {
	    	if($resto == 2) {
		    	if($urlFoto != "") {
			        $elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        else{
		        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	       		}
	       		else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        	}
	    	}
	    }*/
    }
    
    $elemento .= ' </div>';
    $elemento .= '</div>';
    echo $elemento;

    // Former Members
    $numTotal = sizeof($formerMembers);
	$resto = $numTotal % 3;
	$elemento = "";
    $elemento .= '<div class="col-xs-12 formermembers">';
    $elemento .= '<div class="container"><div class="devider"></div><h4 class="text-center">FORMER MEMBERS</h4></div>';
    $elemento .= '<div class="estilo-members">';
    for ($i = 0; $i < sizeof($formerMembers); $i++) {

		$name = $formerMembers[$i][0];
		$position = $formerMembers[$i][1];
		$surname = $formerMembers[$i][2];
		$office = $formerMembers[$i][3];
		$telephone = $formerMembers[$i][4];
		$email = $formerMembers[$i][5];
		$web = $formerMembers[$i][6];
		$urlFoto = $formerMembers[$i][7];
		$elementoLocal = creaElemento($i, $numTotal, $resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web);
  		$elemento .= $elementoLocal;/*
		if($i < $numTotal - $resto){
			if($urlFoto != "") {
		        $elemento .= '<ul class=" col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	        else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		       $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        }
	    }else {
	    	if($resto == 2) {
		    	if($urlFoto != "") {
			        $elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        else{
		        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
			        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
			        $elemento .= '	<li>Office: '.$office.'</li>';
			        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
			        $elemento .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></li>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	       		}
	       		else{
	        	$elemento .= '<ul class="col-md-4 col-sm-6 quedaUno">';
		        $elemento .= '  <li><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img>';
		        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
		        $elemento .= '	<li>Office: '.$office.'</li>';
		        $elemento .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elemento .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Personal Web</a></li>';
		        $elemento .= '</ul>';
	        	}
	    	}
	    }*/
	    
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

	function enlaceADefaultWeb($id, $arrayCSVMembers) {
		$defaultWeb = "";
		$encontrado = false;
		$i = 1;
		while($i < sizeof($arrayCSVMembers) && !$encontrado){
			if($arrayCSVMembers[$i][0]==$id) {
				$defaultWeb = $arrayCSVMembers[$i][4];
				$encontrado = true;
			}
			else {
				$i++;
			}

		}
		return $defaultWeb;
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

	function creaElemento($i, $numTotal, &$resto, $urlFoto, $name, $surname, $office, $telephone, $email, $web) {
		$elementoLocal = "";
		if($i < $numTotal - $resto){
			if($urlFoto != "") {
		        $elementoLocal .= '<ul class="col-md-4 col-sm-6">';
		        $elementoLocal .= '  <li><a href="'.$web.'" target="_blank"><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></a></li>';
		        $elementoLocal .= '  <li>'.$name.' '.$surname.'</li>';
		        $elementoLocal .= '	<li>Office: '.$office.'</li>';
		        $elementoLocal .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elementoLocal .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Web</a></li>';
		        $elementoLocal .= '</ul>';
	        }
	        else{
	        	$elementoLocal .= '<ul class="col-md-4 col-sm-6">';
		        $elementoLocal .= '  <li><a href="'.$web.'" target="_blank"><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img></a></li>';
		        $elementoLocal .= '  <li>'.$name.' '.$surname.'</li>';
		        $elementoLocal .= '	<li>Office: '.$office.'</li>';
		        $elementoLocal .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elementoLocal .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Web</a></li>';
		        $elementoLocal .= '</ul>';
	        }
	    }
	    else {
	    	if($resto == 2) {
		    	if($urlFoto != "") {
			        $elementoLocal .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elementoLocal .= '  <li><a href="'.$web.'" target="_blank"><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></a></li>';
			        $elementoLocal .= '  <li>'.$name.' '.$surname.'</li>';
			        $elementoLocal .= '	<li>Office: '.$office.'</li>';
			        $elementoLocal .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elementoLocal .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Web</a></li>';
			        $elementoLocal .= '</ul>';
		        }
		        else{
		        	$elementoLocal .= '<ul class="col-md-4 col-sm-6 quedaDos">';
			        $elementoLocal .= '  <li><a href="'.$web.'" target="_blank"><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img></a></li>';
			        $elementoLocal .= '  <li>'.$name.' '.$surname.'</li>';
			        $elementoLocal .= '	<li>Office: '.$office.'</li>';
			        $elementoLocal .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
			        $elementoLocal .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Web</a></li>';
			        $elementoLocal .= '</ul>';
		        }
		        $resto = 0;
	    	}
	    	else
	    	{
	    		if($urlFoto != "") {
		        $elementoLocal .= '<ul class="col-md-4 col-sm-6 quedaUnoHead">';
		        $elementoLocal .= '  <li><a href="'.$web.'" target="_blank"><img class="img-responsive avatar-members" src="'.$urlFoto.'""></img></a></li>';
		        $elementoLocal .= '  <li>'.$name.' '.$surname.'</li>';
		        $elementoLocal .= '	<li>Office: '.$office.'</li>';
		        $elementoLocal .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elementoLocal .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Web</a></li>';
		        $elementoLocal .= '</ul>';
	       		}
	       		else{
	        	$elementoLocal .= '<ul class="col-md-4 col-sm-6 quedaUnoHead">';
		        $elementoLocal .= '  <li><a href="'.$web.'" target="_blank"><img class="img-responsive avatar-members" src="http://www.isa.us.es/sites/default/files/pictures/default-avatar.jpg"></img></a></li>';
		        $elementoLocal .= '  <li>'.$name.' '.$surname.'</li>';
		        $elementoLocal .= '	<li>Office: '.$office.'</li>';
		        $elementoLocal .= '  <li>Phone: <a href="tel:'.$telephone.'">'.$telephone.'</a></li>';
		        $elementoLocal .= '  <li><a href="mailto:'.$email.'" target="_blank">Email</a>, <a href="'.$web.'" target="_blank">Web</a></li>';
		        $elementoLocal .= '</ul>';
	        	}
	    	}
	    }
	    return $elementoLocal;
	}
?>