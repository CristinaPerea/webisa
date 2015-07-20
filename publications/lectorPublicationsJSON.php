<?php
	$miurl="http://www.isa.us.es/apps/api/publications";
	$mijson = file_get_contents($miurl);
	$miarray = json_decode($mijson);

	foreach ($miarray as $miarraykey => $miarrayvalue) {
		echo "Title = ".$miarrayvalue->{'title'}.'<br/>';
		//echo "Description = ".$miarrayvalue->{'description'}.'<br/>';
		$autores = "Authors = ";
		foreach ($miarrayvalue->{'authors'} as $miautorkey => $miautorvalue) {
			$autores .= $miautorvalue->{'name'}." ".$miautorvalue->{'surname'}.", ";
		}

		echo $autores.'<br/>';
	}
?>