<?php
	include_once('lectorCSV.php');
	
	$arrayParallax = array();
	//$arrayParallax = loadDataFromCSV("https://docs.google.com/spreadsheets/d/1TUpBi-kl91m-mg83DOnnpmOmE30zU0QKPqIPH0XnueQ/pub?output=csv");
	$arrayParallax = loadDataFromCSV("general/general.csv");
	//print_r($arrayParallax);

	$urlImage;

	$urlImage = $arrayParallax[2][1];

	$elemento = '<section id="testimonial-section">';
    $elemento .= '<div id="testimonial-trigger" class="testimonial text-white parallax" data-stellar-background-ratio="0.5" style="background-image: url('.$urlImage.');">';
    $elemento .= '<div class="cover">';                   
    $elemento .= '</div>';
    $elemento .= '<div class="extra-space-l"></div>';
    $elemento .= '<div class="extra-space-l"></div>';
    $elemento .= '<div class="extra-space-l"></div>';
    $elemento .= '</div>';
    $elemento .= '</section>';
	echo ($elemento);
?>