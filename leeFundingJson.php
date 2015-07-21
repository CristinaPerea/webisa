<?php
	$miJsonURL = "http://www.isa.us.es/apps/api/projects";
	$miJson = file_get_contents($miJsonURL);
	$miJsonDecode = json_decode($miJson);
	//print_r($miJsonDecode);
?>