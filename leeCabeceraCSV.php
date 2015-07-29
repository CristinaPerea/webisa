<?php
	include_once('lectorCSV.php');

	$arrayGeneral = array();
	//$arrayGeneral = loadDataFromCSV("https://docs.google.com/spreadsheets/d/1TUpBi-kl91m-mg83DOnnpmOmE30zU0QKPqIPH0XnueQ/pub?output=csv");
	$arrayGeneral = loadDataFromCSV("general/general.csv");
	//print_r($arrayParallax);

	$urlImage;
	$title;
	$description;

	$urlImage = $arrayGeneral[1][1];
	$title = $arrayGeneral[1][2];
	$description = $arrayGeneral[1][3];

	$elemento =  '<section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5" style="background-image: url('.$urlImage.');">';
	$elemento .= '<div class="container">';
	$elemento .= '<div class="caption text-center text-white" data-stellar-ratio="0.7">';
    $elemento .= '<!--id="owl-intro-text" class="owl-carousel"-->';
	$elemento .= '<div id="" class="">';
	$elemento .= '<div class="item">';
	$elemento .= '<h1>'.$title.'</h1>';
	$elemento .= '<p>'.$description.'</p>';
	$elemento .= '</div>';
	$elemento .= '</div>';
	$elemento .= '</div> <!-- /.caption -->';
	$elemento .= '</div> <!-- /.container -->';

	echo ($elemento);
?>