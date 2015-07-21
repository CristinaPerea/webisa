<?php
	$miJsonURL = "http://www.isa.us.es/apps/api/projects";
	$miJson = file_get_contents($miJsonURL);
	$miJsonDecode = json_decode($miJson);
	$arrayOnGoing = array();
	$arrayNoOnGoing = array();
	//print_r($miJsonDecode)

	foreach ($miJsonDecode as $miJsonKey => $miJsonValue) {

		$title = $miJsonValue->{'title'};
		$authors = "Authors: <br/> ";
		foreach ($miJsonValue->{'authors'} as $authorsKey => $authorsValue) {
			$authors .= $authorsValue->{'name'}." ".$authorsValue->{'surname'}.", ";
		} 
		$acronym = $miJsonValue->{'acronym'};
		$organic = $miJsonValue->{'organic'};
		$coordinator = "Coordinator: ";
		if($miJsonValue->{'coordinator'} != null)
			$coordinator .= $miJsonValue->{'coordinator'}->{'name'}." ".$miJsonValue->{'coordinator'}->{'surname'};
		$startDate = transformaFecha($miJsonValue->{'startDate'});
		$endDate = transformaFecha($miJsonValue->{'endDate'});
		$projectID = $miJsonValue->{'projectID'};


		$miFunding = array();
		array_push($miFunding, $title);
		array_push($miFunding, $authors);
		array_push($miFunding, $acronym);
		array_push($miFunding, $organic);
		array_push($miFunding, $coordinator);
		array_push($miFunding, $startDate);
		array_push($miFunding, $endDate);
		array_push($miFunding, $projectID);

		if(enCurso($miJsonValue->{'endDate'})){
			array_push($arrayOnGoing, $miFunding);
		}else{
			array_push($arrayNoOnGoing, $miFunding);
		}


		unset($miFunding);
	}


	$elemento = "";
    $elemento .= '<div class="col-xs-12 ongoing">';
    $elemento .= '<div class="portfolio_single_content estilo-funding">';

    for ($i = 0; $i < sizeof($arrayOnGoing); $i++) {

		$title = $arrayOnGoing[$i][0];
		$authors = $arrayOnGoing[$i][1];
		$acronym = $arrayOnGoing[$i][2];
		$organic = $arrayOnGoing[$i][3];
		$coordinator = $arrayOnGoing[$i][4];
		$startDate = $arrayOnGoing[$i][5];
		$endDate = $arrayOnGoing[$i][6];
		$projectID = $arrayOnGoing[$i][7];
        $elemento .= '<ul>';
        $elemento .= '<li><a href="http://www.isa.us.es/node/'.$projectID.'" target="_blank" ><b>'.$acronym.'</b></a>. '.$title.'. ('.$startDate.' - '.$endDate.')</li>';
        $elemento .= '</ul>';
    
    }
        $elemento .= ' </div>';
        $elemento .= '</div>';
        echo $elemento;

        $elemento = "";
    $elemento .= '<div class="col-xs-12 publicprivate">';
    $elemento .= '<div class="portfolio_single_content estilo-funding">';

    for ($i = 0; $i < sizeof($arrayNoOnGoing); $i++) {

		$title = $arrayNoOnGoing[$i][0];
		$authors = $arrayNoOnGoing[$i][1];
		$acronym = $arrayNoOnGoing[$i][2];
		$organic = $arrayNoOnGoing[$i][3];
		$coordinator = $arrayNoOnGoing[$i][4];
		$startDate = $arrayNoOnGoing[$i][5];
		$endDate = $arrayNoOnGoing[$i][6];
		$projectID = $arrayNoOnGoing[$i][7];

        $elemento .= '<ul>';
        $elemento .= '<li><a href="http://www.isa.us.es/node/'.$projectID.'" target="_blank" ><b>'.$acronym.'</b></a>. '.$title.'. ('.$startDate.' - '.$endDate.')</li>';
        $elemento .= '</ul>';
    
    }
        $elemento .= ' </div>';
        $elemento .= '</div>';
        echo $elemento;



// FUNCIONES
	function enCurso($date) {
		$caractervacio="";
		$date = substr($date, 0, -9).$caractervacio;
		$mesActual = date("m");
		$añoActual = date("Y");
		$estaEnCurso = false;
		if($añoActual < getYear($date))
			$estaEnCurso = true;
		else {
			if($añoActual == getYear($date)) {
				if($mesActual < getMonth($date))
					$estaEnCurso = true;
			}
		}

		return $estaEnCurso;
	}

	function transformaFecha($date) {
		$fechaFormateada = "";

		$mes = getMonth($date);
		$año = getYear($date);

		switch ($mes) {
			case 1:
				$fechaFormateada .= 'Jan ';
				break;
			case 2:
				$fechaFormateada .= 'Feb ';
				break;
			case 3:
				$fechaFormateada .= 'Mar ';
				break;
			case 4:
				$fechaFormateada .= 'Apr ';
				break;
			case 5:
				$fechaFormateada .= 'May ';
				break;
			case 6:
				$fechaFormateada .= 'Jun ';
				break;
			case 7:
				$fechaFormateada .= 'Jul ';
				break;
			case 8:
				$fechaFormateada .= 'Aug ';
				break;
			case 9:
				$fechaFormateada .= 'Sep ';
				break;
			case 10:
				$fechaFormateada .= 'Oct ';
				break;
			case 11:
				$fechaFormateada .= 'Nov ';
				break;
			default:
				$fechaFormateada .= "Dec ";
				break;
		}

		$fechaFormateada .= $año;

		return $fechaFormateada;
	}

	function getYear($date) {
		$caractervacio="";
		$date = substr($date, 0, -6).$caractervacio;
		return intval($date);
	}

	function getMonth($date) {
		$caractervacio="";
		$date = substr($date, 0, -3).$caractervacio;
		$date = substr($date, 5, 6).$caractervacio;
		return intval($date);

	}
?>