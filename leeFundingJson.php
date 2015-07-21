<?php
	$miJsonURL = "http://www.isa.us.es/apps/api/projects";
	$miJson = file_get_contents($miJsonURL);
	$miJsonDecode = json_decode($miJson);
	$arrayOnGoing = array();
	$arrayNoOnGoing = array();
	//print_r($miJsonDecode);
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

		$miFunding = array();
		array_push($miFunding, $title);
		array_push($miFunding, $authors);
		array_push($miFunding, $acronym);
		array_push($miFunding, $organic);
		array_push($miFunding, $coordinator);
		array_push($miFunding, $startDate);
		array_push($miFunding, $endDate);

		if(enCurso($miJsonValue->{'endDate'})){
			array_push($arrayOnGoing, $miFunding);
		}else{
			array_push($arrayNoOnGoing, $miFunding);
		}


		unset($miFunding);

		//echo $title.'. ';
		//echo $authors.'<br/>';
		//echo $acronym;
		//echo $organic;
		//echo $coordinator;	
		//echo $startDate;
		//echo $endDate;

	}
?>