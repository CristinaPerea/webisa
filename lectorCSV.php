<?php


function loadDataFromCSV($url) {
	$file_handle = fopen($url, "r");
	$contador=0;
	$ficheroEnArray = array();
	while (!feof($file_handle) ) {
		$line_of_text = fgetcsv($file_handle, 1024);
		array_push($ficheroEnArray, $line_of_text);
		$j = 0;
		for($j=0; $j < sizeof($line_of_text); $j++) {
		//	echo $ficheroEnArray[$contador][$j]." | ";

		}
		//echo '<br>';
		$contador++;
	}
	fclose($file_handle);
	//print_r($ficheroEnArray);
	return $ficheroEnArray;
}

function convert( $str ) {
    return iconv( "Windows-1252", "UTF-8", $str );
}

function loadDataFromCSVEncoding($url) {
	$file_handle = fopen($url, "r");
	$contador=0;
	$ficheroEnArray = array();
	while (!feof($file_handle) ) {
		$line_of_text = fgetcsv($file_handle, 1024);
		//echo gettype($line_of_text);
		$line_of_text = array_map( "convert", $line_of_text );
		array_push($ficheroEnArray, $line_of_text);
		$j = 0;
		for($j=0; $j < sizeof($line_of_text); $j++) {
		//	echo $ficheroEnArray[$contador][$j]." | ";

		}
		//echo '<br>';
		$contador++;
	}
	fclose($file_handle);
	//print_r($ficheroEnArray);
	return $ficheroEnArray;
}
//https://docs.google.com/spreadsheets/d/1r_HzzjbG93PYkgZXTz7vwwxR7pCIilCSLb-m3t_rzic/export?format=csv&id=1r_HzzjbG93PYkgZXTz7vwwxR7pCIilCSLb-m3t_rzic&gid=510265839
//loadDataFromCSV("https://docs.google.com/spreadsheets/d/1r_HzzjbG93PYkgZXTz7vwwxR7pCIilCSLb-m3t_rzic/export?format=csv&id=1r_HzzjbG93PYkgZXTz7vwwxR7pCIilCSLb-m3t_rzic");
?>
