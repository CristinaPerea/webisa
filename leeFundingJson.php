<?php
	$miJsonURL = "http://www.isa.us.es/apps/api/projects";
	$miJson = file_get_contents($miJsonURL);
	$miJsonDecode = json_decode($miJson);
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
		$startDate = $miJsonValue->{'startDate'};
		$endDate = $miJsonValue->{'endDate'};

		echo $title.'. ';
		echo $authors.'<br/>';
		echo $acronym;
		echo $organic;
		echo $coordinator;	
		echo $startDate;
		echo $endDate;

	}
?>