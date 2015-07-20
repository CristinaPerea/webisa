<?php
	$miJsonURL = "http://www.isa.us.es/apps/api/members";
	$miJson = file_get_contents($miJsonURL);
	//print_r(json_decode($miJson));
	$miJsonDecode = json_decode($miJson);
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
		$miPersonal = array();
		array_push($miPersonal, $name);
		array_push($miPersonal, $position);
		array_push($miPersonal, $surname);
		array_push($miPersonal, $office);
		array_push($miPersonal, $telephone);
		array_push($miPersonal, $email);
		array_push($miPersonal, $web);
		//print_r($miPersonal);
		if(strcmp($position,"Accredited Full Professor ") == 0) {
		 	array_push($head, $miPersonal);	
		}
		 else if (strcmp($position,"Associate Professor")==0 || strcmp($position,"PhD Lecturer")==0 || strcmp($position,"Lecturer")==0 || strcmp($position,"Research Staff")==0)
		 	array_push($researchStaff, $miPersonal);
		 /*else if ($position == "Research Assistant" || $position == "Granted PhD Student" || $position == "Technical")
		 	array_push($reseachAssistants, $miPersonal);
		 else if ($position == "External collaborators")
		 	array_push($externalsCollaborators, $miPersonal);
		 else if ($position == "Former member")
		 	array_push($formerMembers, $miPersonal);
		 else
		 	array_push($technicalStaff, $miPersonal);*/
		unset($miPersonal);
		

		/*if(!in_array($position, $miArrayPositions)){
			array_push($miArrayPositions, $position);
		}*/
		//echo $elemento;
	}
 //Creación del /all
	echo $contador;
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
        $elemento .= '<ul>';
        $elemento .= '  <li>'.$name.' '.$surname.'</li>';
        $elemento .= '	<li>'.$office.', '.$telephone.', '.$email.', '.$web.'</li>';
        $elemento .= '</ul>';
    
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
?>